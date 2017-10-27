<?php

namespace App\Models\Fine\Traits\Relationship;

/**
 * Class CartRelationship.
 */
trait CartRelationship
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
    public function ticket()
    {
        return $this->belongsTo(config('fine.ticket'));
    }
}
