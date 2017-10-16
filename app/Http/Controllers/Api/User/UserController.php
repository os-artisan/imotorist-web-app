<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Access\User\Motorist;
use App\Http\Controllers\Api\User\Traits\UserObject;

/**
 * Class UserController.
 */
class UserController extends Controller
{
    use UserObject;

    public function getUser(Request $request)
    {
        // Make sure the logged in user has permission.

        $license = $request->input('license_no');

        $user = Motorist::where('license_no', '=', $license)->first()->user;

        return $this->sendUserWithMotorist($user);
    }
}
