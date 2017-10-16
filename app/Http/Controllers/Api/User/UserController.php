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

        $motorist = Motorist::where('license_no', '=', $license)->first();

<<<<<<< HEAD
        if(isset($motorist)){
        	return $this->sendUserWithMotorist($motorist->user);
        }

        return response()->json([], 404);
	}
=======
        return $this->sendUserWithMotorist($user);
    }
>>>>>>> 189c06da420557b88a37e31ad0a1c71cb6efb906
}
