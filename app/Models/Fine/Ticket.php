<?php

namespace App\Models\Fine;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fine\Traits\TicketAccess;
use App\Models\Fine\Traits\Attribute\TicketAttribute;
use App\Models\Fine\Traits\Relationship\TicketRelationship;

/**
 * Class Ticket.
 */
class Ticket extends Model
{
    use TicketAttribute,
        TicketAccess,
        TicketRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ticket_no', 'motorist_id', 'officer_id', 'station_id', 'payment_id', 'vehicle_no', 'lat', 'lng', 'location', 'paid', 'remarks', 'court_date', 'total_amount'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('fine.tickets_table');
    }
}
