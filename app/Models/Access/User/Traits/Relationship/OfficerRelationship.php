<?php

namespace App\Models\Access\User\Traits\Relationship;

/**
 * Class OfficerRelationship.
 */
trait OfficerRelationship
{
    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Access\User\User');
    }
}
