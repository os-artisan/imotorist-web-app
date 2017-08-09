<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\Auth;
use App\Events\Frontend\Auth\UserLoggedIn;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Api\Auth\Traits\IssueTokenTrait;

class LoginController extends Controller
{
    use IssueTokenTrait,
        AuthenticatesUsers;

    private $client;

    public function __construct()
    {
        $this->client = Client::find(1);
    }

    /**
     * Override AuthenticatesUsers method so that users can login using either email or mobile.
     *
     * @return string
     */
    public function username()
    {
        $login = request()->input('username');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        request()->merge([$field => $login]);

        return $field;
    }

    /**
     * Override AuthenticatesUsers method to validate login.
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Override AuthenticatesUsers method.
     */
    protected function sendLoginResponse(Request $request)
    {

        $this->clearLoginAttempts($request);
        
        return $this->authenticated($request, $this->guard()->user());

    }

    protected function authenticated(Request $request, $user)
    {
        /*
         * Check to see if the users account is confirmed and active
         */
        if (! $user->isConfirmed()) {
            access()->logout();
            return ['alert' => trans('exceptions.frontend.auth.confirmation.resend', ['user_id' => $user->id])];
        } elseif (! $user->isActive()) {
            access()->logout();
            return ['alert' => trans('exceptions.frontend.auth.deactivated')];
        }

        event(new UserLoggedIn($user));

        return $this->issueToken($request, 'password');
    }

    /**
     * Request for a new token using the refresh token.
     *
     * @return string
     */
    public function refresh(Request $request)
    {
        $this->validate($request, [
            'refresh_token' => 'required',
        ]);

        return $this->issueToken($request, 'refresh_token');
    }

    /**
     * Logout and revoke the token.
     *
     * @return string
     */
    public function logout(Request $request)
    {
        $accessToken = Auth::user()->token();

        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);

        $accessToken->revoke();

        return response()->json([], 204);
    }
}
