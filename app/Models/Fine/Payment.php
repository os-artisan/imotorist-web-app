<?php

namespace App\Models\Fine;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fine\Traits\Relationship\PaymentRelationship;

/**
 * Class Payment.
 */
class Payment extends Model
{
    use PaymentRelationship;

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
    protected $fillable = ['user_id', 'total_amount', 'method', 'status'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('fine.payments_table');
    }
}
