<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('macros', 'FrontendController@macros')->name('macros');
Route::get('info', 'InfoController@index')->name('info');
Route::get('contact', 'ContactController@index')->name('contact');
Route::get('cart', 'Cart\CartController@index')->name('cart');

Route::resource('ticket', 'Ticket\TicketController', ['only' => ['show']]);
Route::get('ticket', 'Ticket\TicketController@index')->name('ticket');
Route::post('ticket', 'Ticket\TicketController@search')->name('ticket.post');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
    });
});
