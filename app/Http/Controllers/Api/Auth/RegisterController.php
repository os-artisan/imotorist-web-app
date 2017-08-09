<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Events\Frontend\Auth\UserRegistered;
use App\Http\Controllers\Api\Auth\Traits\IssueTokenTrait;
use App\Repositories\Frontend\Access\User\UserRepository;

/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    use IssueTokenTrait;

    private $client;

    public function __construct(UserRepository $user)
    {
        $this->client = Client::find(1);

        $this->user = $user;
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'surname'           => 'required|string|max:191',
            'other_names'       => 'required|string|max:191',
            'email'             => ['required', 'string', 'email', 'max:191', Rule::unique('users')],
            'password'          => 'required|string|min:6',
        ]);

        if (config('access.users.confirm_email')) {
            $user = $this->user->create($request->only('surname', 'other_names', 'email', 'password'));
            event(new UserRegistered($user));

            //$params['message'] = trans('exceptions.frontend.auth.confirmation.created_confirm');
        } else {
            access()->login($this->user->create($request->only('surname', 'other_names', 'email', 'password')));
            event(new UserRegistered(access()->user()));
        }

        return ['alert' => trans('exceptions.frontend.auth.confirmation.created_confirm')];
    }
}
