<?php

/**
 * Api Access Controllers
 * All route names are prefixed with 'api'.
 */
Route::group(['namespace' => 'Fine'], function () {
    Route::post('make-payment', 'PaymentController@payment')->name('api.make-payment');
});

Route::group(['namespace' => 'Fine', 'middleware' => 'auth:api'], function () {
    Route::post('store-ticket', 'TicketController@store');

    Route::post('get-ticket', 'TicketController@show');

    Route::get('offences', 'OffenceController@index');
});
