<?php

namespace App\Models\Access\User\Traits\Relationship;

/**
 * Class OfficerRelationship.
 */
trait MotoristRelationship
{
    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }

    /**
     * @return mixed
     */
    public function vehicleClasses()
    {
        return $this->belongsToMany(config('license.vehicle_class'), config('license.motorist_vehicle_class_table'), 'motorist_id', 'vehicle_class_id');
    }

    /**
     * @return mixed
     */
    public function tickets()
    {
        return $this->hasMany(config('fine.ticket'));
    }
}
