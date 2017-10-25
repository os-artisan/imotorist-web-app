<?php

/**
 * Api Access Controllers
 * All route names are prefixed with 'api'.
 */
Route::group(['namespace' => 'Fine', 'middleware' => 'auth:api'], function () {
    Route::post('store-ticket', 'TicketController@store');

    Route::post('get-ticket', 'TicketController@show');

    Route::get('get-motorist-ticket', 'TicketController@showMotoristTicket');

    Route::get('get-officer-ticket', 'TicketController@showOfficerTicket');

    Route::get('offences', 'OffenceController@index');

    Route::post('payment', 'PaymentController@completePayment')->name('payment');
});
