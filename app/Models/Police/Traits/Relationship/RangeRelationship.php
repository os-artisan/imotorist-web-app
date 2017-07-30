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
}
