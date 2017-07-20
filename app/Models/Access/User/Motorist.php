<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\Access\User\Traits\Relationship\MotoristRelationship;

class Motorist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'license_no', 'issued_date', 'expiry_date'];
}
