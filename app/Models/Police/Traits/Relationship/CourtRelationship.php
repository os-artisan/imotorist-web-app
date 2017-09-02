<?php

namespace App\Models\Police\Traits\Relationship;

/**
 * Class CourtRelationship.
 */
trait CourtRelationship
{
    /**
     * @return mixed
     */
    public function stations()
    {
        return $this->hasMany(config('police.station'));
    }
}
