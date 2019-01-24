<?php

/**
 * Api Access Controllers
 * All route names are prefixed with 'api'.
 */
Route::group(['namespace' => 'Auth'], function () {
    // Register a new user into the system
    Route::post('register', 'RegisterController@register');

    // User Login
    Route::post('login', 'LoginController@login');

    // Request a new access_token using refresh_token
    Route::post('refresh', 'LoginController@refresh');

    /*
     * Only logged in users can access these routes
     */
    Route::middleware('auth:api')->group(function () {
        // Logout a logged in user
        Route::post('logout', 'LoginController@logout');
    });
});
