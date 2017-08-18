<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Api'], function () {
    includeRouteFiles(__DIR__.'/Api/');
});