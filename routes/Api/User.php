<?php

/**
 * Api Access Controllers
 * All route names are prefixed with 'api'.
 */
Route::group(['namespace' => 'User', 'middleware' => 'auth:api'], function () {
    // Get logged in user
    Route::get('logged-in-user', 'LoggedInUserController@getLoggedInUser');

    // Get user by D/L number
    Route::post('get-user', 'UserController@getUser');

    // Register Firebase token
    Route::post('register-firebase', 'UserController@updateFirebaseToken');
});
