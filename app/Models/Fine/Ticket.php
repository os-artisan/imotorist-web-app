<?php

namespace App\Models\Fine;

use Illuminate\Support\Facades\Cache;
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

    public static function count()
    {
        return Cache::remember('count_tickets', 15, function () {
            return static::query()->count();
        });
    }

    public static function revenue()
    {
        return Cache::remember('sum_revenue', 15, function () {
            return static::query()->where('paid', true)->sum('total_amount');
        });
    }
}
