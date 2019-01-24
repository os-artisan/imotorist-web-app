<?php

/**
 * All route names are prefixed with 'admin.fine'.
 */
Route::group([
    'prefix' => 'fine',
    'as' => 'fine.',
    'namespace' => 'Fine',
], function () {
    /*
     * For Offence DataTables
     */
    Route::post('offence/get', 'OffenceTableController')->name('offence.get');

    /*
     * Offence CRUD
     */
    Route::resource('offence', 'OffenceController');
});
