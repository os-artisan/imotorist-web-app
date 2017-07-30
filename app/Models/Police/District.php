<?php

namespace App\Models\Police;

use Illuminate\Database\Eloquent\Model;
use App\Models\Police\Traits\Relationship\DistrictRelationship;

/**
 * Class District.
 */
class District extends Model
{
    use DistrictRelationship;

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
    protected $fillable = ['division_id', 'name'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('police.districts_table');
    }
}
