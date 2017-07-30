<?php

namespace App\Models\Police;

use Illuminate\Database\Eloquent\Model;
use App\Models\Police\Traits\Relationship\DivisionRelationship;

/**
 * Class Division.
 */
class Division extends Model
{
    use DivisionRelationship;

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
    protected $fillable = ['range_id', 'name'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('police.divisions_table');
    }
}
