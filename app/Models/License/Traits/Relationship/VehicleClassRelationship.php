<?php

namespace App\Models\License\Traits\Relationship;

/**
 * Class OfficerRelationship.
 */
trait VehicleClassRelationship
{
    /**
     * @return mixed
     */
    public function children()
    {
        return $this->belongsToMany(config('license.vehicle_class'), config('license.other_vehicle_classes_table'), 'vehicle_class_id', 'other_vehicle_class_id');
    }

    /**
     * @return mixed
     */
    public function parents()
    {
        return $this->belongsToMany(config('license.vehicle_class'), config('license.other_vehicle_classes_table'), 'other_vehicle_class_id', 'vehicle_class_id');
    }

    /**
     * @return mixed
     */
    public function motorists()
    {
        return $this->belongsToMany(config('access.motorist'), config('license.motorist_vehicle_class_table'), 'vehicle_class_id', 'motorist_id');
    }
}
