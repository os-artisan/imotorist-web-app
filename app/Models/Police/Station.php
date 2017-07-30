<?php

namespace App\Models\Police;

use Illuminate\Database\Eloquent\Model;
use App\Models\Police\Traits\Relationship\StationRelationship;

/**
 * Class Station.
 */
class Station extends Model
{
    use StationRelationship;

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
    protected $fillable = ['district_id', 'name', 'status'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('police.stations_table');
    }
}
