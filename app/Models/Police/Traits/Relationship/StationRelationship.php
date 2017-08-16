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

    /**
     * @return mixed
     */
    public function division()
    {
        return $this->district->division();
    }

    /**
     * @return mixed
     */
    public function range()
    {
        return $this->division->range();
    }

    /**
     * @return mixed
     */
    public function tickets()
    {
        return $this->hasMany(config('fine.ticket'));
    }

    /**
     * @return mixed
     */
    public function officers()
    {
        return $this->morphToMany(config('access.officer'), 'employable');
    }
}
