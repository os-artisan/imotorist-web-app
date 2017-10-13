<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\User\Traits\UserObject;

/**
 * Class LoggedInUserController.
 */
class LoggedInUserController extends Controller
{
    use UserObject;

    public function getLoggedInUser()
    {
        // Get logged in user
        $user = Auth::user();

        return $this->sendUserWithMotoristAndOfficer($user);
    }
}
