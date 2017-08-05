<?php

namespace App\Models\Fine;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fine\Traits\Relationship\TicketRelationship;

/**
 * Class Ticket.
 */
class Ticket extends Model
{
    use TicketRelationship;

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
    protected $fillable = ['motorist_id', 'officer_id', 'station_id', 'vehicle_no', 'lat', 'lng', 'location', 'paid', 'remarks'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('fine.tickets_table');
    }
}
