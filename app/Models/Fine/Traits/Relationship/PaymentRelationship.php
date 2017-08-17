<?php

namespace App\Models\Fine\Traits\Relationship;

/**
 * Class PaymentRelationship.
 */
trait PaymentRelationship
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
    public function tickets()
    {
        return $this->hasMany(config('fine.ticket'));
    }
}
