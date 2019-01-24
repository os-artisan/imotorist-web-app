<?php

namespace App\Repositories\Backend\Fine;

use App\Models\Fine\Offence;
use App\Models\Access\User\User;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Access\User\UserCreated;
use App\Events\Backend\Access\User\UserDeleted;
use App\Events\Backend\Access\User\UserUpdated;
use App\Events\Backend\Access\User\UserRestored;
use App\Events\Backend\Access\User\UserDeactivated;
use App\Events\Backend\Access\User\UserReactivated;
use App\Events\Backend\Access\User\UserPasswordChanged;
use App\Events\Backend\Access\User\UserPermanentlyDeleted;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class OffenceRepository.
 */
class OffenceRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Offence::class;

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
    public function getForDataTable()
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        $dataTableQuery = $this->query()
            ->select([
                config('fine.offences_table').'.id',
                config('fine.offences_table').'.description',
                config('fine.offences_table').'.fine',
                config('fine.offences_table').'.dip',
            ]);

        return $dataTableQuery;
    }

    /**
     * @param array $input
     */
    public function create($input)
    {
        $data = $input['data'];
        $roles = $input['roles'];

        $user = $this->createUserStub($data);

        DB::transaction(function () use ($user, $data, $roles) {
            if ($user->save()) {
                //User Created, Validate Roles
                if (! \count($roles['assignees_roles'])) {
                    throw new GeneralException(trans('exceptions.backend.access.users.role_needed_create'));
                }

                //Attach new roles
                $user->attachRoles($roles['assignees_roles']);

                //Send confirmation email if requested
                if (isset($data['confirmation_email']) && 0 === $user->confirmed) {
                    $user->notify(new UserNeedsConfirmation($user->confirmation_code));
                }

                event(new UserCreated($user));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param Model $user
     * @param array $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $user, array $input)
    {
        $data = $input['data'];
        $roles = $input['roles'];

        $this->checkUserByEmail($data, $user);

        $user->surname = $data['surname'];
        $user->other_names = $data['other_names'];
        $user->email = $data['email'];
        $user->status = isset($data['status']) ? 1 : 0;
        $user->confirmed = isset($data['confirmed']) ? 1 : 0;

        DB::transaction(function () use ($user, $data, $roles) {
            if ($user->save()) {
                $this->checkUserRolesCount($roles);
                $this->flushRoles($roles, $user);

                event(new UserUpdated($user));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
        });
    }

    /**
     * @param Model $user
     * @param $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function updatePassword(Model $user, $input)
    {
        $user->password = bcrypt($input['password']);

        if ($user->save()) {
            event(new UserPasswordChanged($user));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.update_password_error'));
    }

    /**
     * @param Model $user
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $user)
    {
        if (access()->id() === $user->id) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_delete_self'));
        }

        if (1 === $user->id) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_delete_admin'));
        }

        if ($user->delete()) {
            event(new UserDeleted($user));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
    }

    /**
     * @param Model $user
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $user)
    {
        if (null === $user->deleted_at) {
            throw new GeneralException(trans('exceptions.backend.access.users.delete_first'));
        }

        DB::transaction(function () use ($user) {
            if ($user->forceDelete()) {
                event(new UserPermanentlyDeleted($user));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
        });
    }

    /**
     * @param Model $user
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function restore(Model $user)
    {
        if (null === $user->deleted_at) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_restore'));
        }

        if ($user->restore()) {
            event(new UserRestored($user));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.restore_error'));
    }

    /**
     * @param Model $user
     * @param $status
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function mark(Model $user, $status)
    {
        if (access()->id() === $user->id && 0 === $status) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
        }

        $user->status = $status;

        switch ($status) {
            case 0:
                event(new UserDeactivated($user));
            break;

            case 1:
                event(new UserReactivated($user));
            break;
        }

        if ($user->save()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.mark_error'));
    }

    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createUserStub($input)
    {
        $user = self::MODEL;
        $user = new $user();
        $user->surname = $input['surname'];
        $user->other_names = $input['other_names'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->verified = isset($input['verified']) ? 1 : 0;
        $user->address = $input['address'];
        $user->nic = $input['nic'];
        $user->passport = $input['passport'];
        $user->date_of_birth = $input['date_of_birth'];
        $user->password = bcrypt($input['password']);
        $user->status = isset($input['status']) ? 1 : 0;
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = isset($input['confirmed']) ? 1 : 0;

        return $user;
    }
}
