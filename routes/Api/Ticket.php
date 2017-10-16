<?php

/**
 * Api Access Controllers
 * All route names are prefixed with 'api'.
 */
Route::group(['namespace' => 'Ticket', 'middleware' => 'auth:api'], function () {
    Route::post('store-ticket', 'TicketController@store');

    Route::post('show-ticket', 'TicketController@show');
});
