<?php

use App\Models\Police\Range;
use App\Models\Police\Station;
use App\Models\Police\District;
use App\Models\Police\Division;

return [
    /*
     * Range model.
    */
    'range' => Range::class,

    /*
     * Ranges table used to store police ranges.
     */
    'ranges_table' => 'ranges',

    /*
     * Division model.
    */
    'division' => Division::class,

    /*
     * Divisions table used to store provinces.
     */
    'divisions_table' => 'divisions',

    /*
     * District model.
    */
    'district' => District::class,

    /*
     * Districts table used to store districts.
     */
    'districts_table' => 'districts',

    /*
     * Station model.
    */
    'station' => Station::class,

    /*
     * Police Stations table used to store police stations.
     */
    'stations_table' => 'stations',

    /*
     * Employables table used to store which officer works for which station, district, division or range.
     */
    'employables_table' => 'employables',
];
