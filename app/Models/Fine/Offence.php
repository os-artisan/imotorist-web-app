<?php

namespace App\Models\Fine;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fine\Traits\Attribute\OffenceAttribute;
use App\Models\Fine\Traits\Relationship\OffenceRelationship;

/**
 * Class Offence.
 */
class Offence extends Model
{
    use OffenceAttribute,
        OffenceRelationship;

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
    protected $fillable = ['description', 'description_si', 'fine', 'dip'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('fine.offences_table');
    }
}
