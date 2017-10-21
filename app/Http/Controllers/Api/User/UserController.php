<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Access\User\Motorist;
use Illuminate\Support\Facades\Auth;
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

        $motorist = Motorist::where('license_no', '=', $license)->first();

        if (isset($motorist)) {
            return $this->sendUserWithMotorist($motorist->user);
        }

        return response()->json([], 404);
    }

    public function updateFirebaseToken(Request $request)
    {
        $this->validate($request, [
            'firebase_token' => 'required',
        ]);

        $user = Auth::user();
        $user->firebase_token = $request->firebase_token;

        if ($user->save()) {
            return response()->json([], 204);
        }
    }
}
