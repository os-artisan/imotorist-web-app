<?php

namespace App\Models\Fine\Traits\Relationship;

/**
 * Class TicketRelationship.
 */
trait TicketRelationship
{
    /**
     * @return mixed
     */
    public function offences()
    {
        return $this->belongsToMany(config('fine.offence'), config('fine.ticket_offence_table'), 'ticket_id', 'offence_id');
    }

    /**
     * @return mixed
     */
    public function motorist()
    {
        return $this->belongsTo(config('access.motorist'));
    }

    /**
     * @return mixed
     */
    public function officer()
    {
        return $this->belongsTo(config('access.officer'));
    }

    /**
     * @return mixed
     */
    public function station()
    {
        return $this->belongsTo(config('police.station'));
    }

    /**
     * @return mixed
     */
    public function payment()
    {
        return $this->belongsTo(config('fine.payment'));
    }
}
