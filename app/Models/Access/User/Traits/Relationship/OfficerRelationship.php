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
        return $this->belongsTo(config('auth.providers.users.model'), 'id', 'id');
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
    public function station()
    {
        return $this->morphedByMany(config('police.station'), 'employable');
    }

    /**
     * @return mixed
     */
    public function district()
    {
        return $this->morphedByMany(config('police.district'), 'employable');
    }

    /**
     * @return mixed
     */
    public function division()
    {
        return $this->morphedByMany(config('police.division'), 'employable');
    }

    /**
     * @return mixed
     */
    public function range()
    {
        return $this->morphedByMany(config('police.range'), 'employable');
    }
}
