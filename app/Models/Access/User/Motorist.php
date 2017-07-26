<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Access\User\Traits\Relationship\MotoristRelationship;

/**
 * Class Motorist.
 */
class Motorist extends Model
{
    use SoftDeletes,
        MotoristRelationship;

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
    protected $fillable = ['user_id', 'license_no', 'issued_date', 'expiry_date', 'status'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.motorists_table');
    }
}
