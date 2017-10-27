<?php

namespace App\Models\Fine;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fine\Traits\Relationship\CartRelationship;

/**
 * Class Cart.
 */
class Cart extends Model
{
    use CartRelationship;

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
    protected $fillable = ['user_id', 'ticket_id', 'total'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('fine.carts_table');
    }
}
