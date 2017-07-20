<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\Access\User\Traits\Relationship\OfficerRelationship;

class Officer extends Model
{
    use OfficerRelationship;

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
    protected $fillable = ['user_id', 'badge_no'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.officers_table');
    }
}
