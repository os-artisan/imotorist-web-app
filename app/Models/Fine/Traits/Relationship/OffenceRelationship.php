<?php

namespace App\Models\Fine\Traits\Relationship;

/**
 * Class OffenceRelationship.
 */
trait OffenceRelationship
{
    /**
     * @return mixed
     */
    public function tickets()
    {
        return $this->belongsToMany(config('fine.ticket'), config('fine.ticket_offence_table'), 'offence_id', 'ticket_id');
    }
}
