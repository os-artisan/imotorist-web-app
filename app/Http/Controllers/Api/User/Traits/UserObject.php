<?php

namespace App\Http\Controllers\Api\User\Traits;

use App\Models\Access\User\User;

trait UserObject
{
    public function __construct()
    {
        $this->user_except = ['confirmation_code', 'created_at', 'updated_at', 'deleted_at'];
        $this->motorist_except = ['id', 'created_at', 'updated_at', 'deleted_at'];
        $this->officer_except = ['id', 'created_at', 'updated_at', 'deleted_at'];
    }

    public function sendUser(User $user)
    {
        $user = $this->unsetUserAttributes($user);

        return response()->json($user);
    }

    public function sendUserWithMotorist(User $user)
    {
        // Eager load motorist and officer models
        $user->load('motorist');

        $user = $this->unsetUserAttributes($user);
        $user = $this->unsetMotoristAttributes($user);

        return response()->json($user);
    }

    public function sendUserWithMotoristAndOfficer(User $user)
    {
        // Eager load motorist and officer models
        $user->load('motorist', 'officer');

        $user = $this->unsetUserAttributes($user);
        $user = $this->unsetMotoristAttributes($user);
        $user = $this->unsetOfficerAttributes($user);

        return response()->json($user);
    }

    public function unsetUserAttributes(User $user)
    {
        //exclude defined elements from user model
        foreach ($this->user_except as $key => $except) {
            unset($user->$except);
        }

        return $user;
    }

    public function unsetMotoristAttributes(User $user)
    {
        if (isset($user->motorist)) {
            foreach ($this->motorist_except as $key => $except) {
                unset($user->motorist->$except);
            }
        }

        return $user;
    }

    public function unsetOfficerAttributes(User $user)
    {
        if (isset($user->officer)) {
            foreach ($this->officer_except as $key => $except) {
                unset($user->officer->$except);
            }
        }

        return $user;
    }
}
