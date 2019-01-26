<?php

namespace App\Repositories\Backend\Fine;

use App\Models\Fine\Offence;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Fine\Offence\OffenceCreated;
use App\Events\Backend\Fine\Offence\OffenceDeleted;
use App\Events\Backend\Fine\Offence\OffenceUpdated;

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
        $offence = $this->createOffenceStub($input);

        DB::transaction(function () use ($offence, $input) {
            if ($offence->save()) {
                event(new OffenceCreated($offence));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.fine.offences.create_error'));
        });
    }

    /**
     * @param Model $offence
     * @param array $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $offence, array $input)
    {
        $offence->description = $input['description'];
        $offence->description_si = $input['description_si'];
        $offence->fine = $input['fine'];
        $offence->dip = $input['dip'];

        DB::transaction(function () use ($offence, $input) {
            if ($offence->save()) {
                event(new OffenceUpdated($offence));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.fine.offences.update_error'));
        });
    }

    /**
     * @param Model $offence
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $offence)
    {
        if ($offence->delete()) {
            event(new OffenceDeleted($offence));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.fine.offences.delete_error'));
    }

    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createOffenceStub($input)
    {
        $offence = self::MODEL;
        $offence = new $offence();
        $offence->description = $input['description'];
        $offence->description_si = $input['description_si'];
        $offence->fine = $input['fine'];
        $offence->dip = $input['dip'];

        return $offence;
    }
}
