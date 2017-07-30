<?php

namespace App\Models\Police\Traits\Relationship;

/**
 * Class StationRelationship.
 */
trait StationRelationship
{
    /**
     * @return mixed
     */
    public function district()
    {
        return $this->belongsTo(config('police.district'));
    }
}
