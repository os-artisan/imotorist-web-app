<?php

use App\Models\License\VehicleClass;

return [
    /*
     * VehicleClass model used by Motorist Vehicle Class to get vehicle class relations.
    */
    'vehicle_class' => VehicleClass::class,

    /*
     * Vehicle Classes table used to store Vehicle Classes in the database.
     */
    'vehicle_classes_table' => 'vehicle_classes',

    /*
     * Other Vehicle Classes table used to store Other Class of Vehicles that can be driven in the database.
     */
    'other_vehicle_classes_table' => 'other_vehicle_classes',

    /*
     * Motorist Vehicle Classes table used to store Vehicle Class relations of motorists in the database.
     */
    'motorist_vehicle_class_table' => 'motorist_vehicle_class',
];
