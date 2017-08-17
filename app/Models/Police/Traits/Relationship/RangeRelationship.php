<?php

namespace App\Models\Police\Traits\Relationship;

/**
 * Class RangeRelationship.
 */
trait RangeRelationship
{
    /**
     * @return mixed
     */
    public function divisions()
    {
        return $this->hasMany(config('police.division'));
    }

    /**
     * @return mixed
     */
    public function districts()
    {
        return $this->hasManyThrough(config('police.district'), config('police.division'), 'range_id', 'division_id');
    }

    /**
     * @return mixed
     */
    public function stations()
    {
        $stations = [];

        foreach ($this->districts as $district) {
            $stations[] = $district->stations;
        }

        return $stations; //returns a nested array with empty arrays. Need to fix! Range::first()->stations();
    }

    /**
     * @return mixed
     */
    public function officers()
    {
        return $this->morphToMany(config('access.officer'), 'employable');
    }
}
