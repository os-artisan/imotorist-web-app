<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Laravel\Passport\Client;
use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Auth\Traits\IssueTokenTrait;

/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    use IssueTokenTrait;

    private $client;

    public function __construct()
    {
        $this->client = Client::find(1);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'surname' => 'required',
            'other_names' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'surname' => request('surname'),
            'other_names' => request('other_names'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        return $this->issueToken($request, 'password');
    }
}
