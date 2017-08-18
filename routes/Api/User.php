<?php

/**
 * Api Access Controllers
 * All route names are prefixed with 'api'.
 */
Route::group(['namespace' => 'User', 'middleware' => 'auth:api'], function () {
    
    // Get logged in user
    Route::get('user', 'ProfileController@getUser');
});