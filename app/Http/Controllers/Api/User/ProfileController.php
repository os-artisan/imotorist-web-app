<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{
    public function getUser()
    {
        // Get logged in user and eager load motorist and officer models
        $user = Auth::user();
        $user->load('motorist', 'officer');

        // elements to be excluded from user model
        $user_except = ['confirmation_code', 'created_at', 'updated_at', 'deleted_at'];

        // elements to be excluded from motorist model
        $motorist_except = ['id', 'created_at', 'updated_at', 'deleted_at'];

        // elements to be excluded from officer model
        $officer_except = ['id', 'created_at', 'updated_at', 'deleted_at'];

        //exclude defined elements from each model
        foreach ($user_except as $key => $except) {
            unset($user->$except);
        }
        if (isset($user->motorist)) {
            foreach ($motorist_except as $key => $except) {
                unset($user->motorist->$except);
            }
        }
        if (isset($user->officer)) {
            foreach ($officer_except as $key => $except) {
                unset($user->officer->$except);
            }
        }

        return response()->json(['user' => $user]);
    }
}
