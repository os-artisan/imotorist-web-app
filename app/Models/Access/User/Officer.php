<?php

namespace App\Models\Access\User;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Access\User\Traits\Relationship\OfficerRelationship;

/**
 * Class Officer.
 */
class Officer extends Model
{
    use SoftDeletes,
        OfficerRelationship;

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
    protected $fillable = ['id', 'badge_no', 'status'];

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
        $this->table = config('access.officers_table');
    }

    public static function count()
    {
        return Cache::remember('count_officers', 15, function () {
            return static::query()->count();
        });
    }
}
