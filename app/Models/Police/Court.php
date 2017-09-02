<?php

namespace App\Models\Police;

use Illuminate\Database\Eloquent\Model;
use App\Models\Police\Traits\Relationship\CourtRelationship;

/**
 * Class Court.
 */
class Court extends Model
{
    use CourtRelationship;

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
    protected $fillable = ['name'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('police.courts_table');
    }
}
