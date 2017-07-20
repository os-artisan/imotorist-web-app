<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\Access\User\Traits\Relationship\OfficerRelationship;

class Officer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'officers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'badge_no'];
}
