<?php

namespace App\Models\Police\Traits\Relationship;

/**
 * Class DivisionRelationship.
 */
trait DivisionRelationship
{
    /**
     * @return mixed
     */
    public function range()
    {
        return $this->belongsTo(config('police.range'));
    }

    /**
     * @return mixed
     */
    public function districts()
    {
        return $this->hasMany(config('police.district'));
    }

    /**
     * @return mixed
     */
    public function stations()
    {
        return $this->hasManyThrough(config('police.station'), config('police.district'), 'division_id', 'district_id');
    }
}
