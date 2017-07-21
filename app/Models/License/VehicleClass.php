<?php

namespace App\Models\License;

use Illuminate\Database\Eloquent\Model;
use App\Models\License\Traits\Relationship\VehicleClassRelationship;

/**
 * Class VehicleClass.
 */
class VehicleClass extends Model
{
    use VehicleClassRelationship;

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
    protected $fillable = ['class', 'description'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('license.vehicle_classes_table');
    }
}
