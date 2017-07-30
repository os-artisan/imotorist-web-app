<?php

namespace App\Models\Police\Traits\Relationship;

/**
 * Class DistrictRelationship.
 */
trait DistrictRelationship
{
    /**
     * @return mixed
     */
    public function division()
    {
        return $this->belongsTo(config('police.division'));
    }

	/**
     * @return mixed
     */
    public function stations()
    {
        return $this->hasMany(config('police.station'));
    }
}
