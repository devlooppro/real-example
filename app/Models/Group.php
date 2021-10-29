<?php

namespace App\Models;

use App\Models\Contracts\HasMediaInterface;
use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Group
 *
 * @property-read int $id
 * @property-read Carbon|null $updated_at
 *
 * @property-read Collection $users
 *
 * @mixin Eloquent
 */
class Group extends Model implements HasMediaInterface
{
    /**
     * The attributes that should be casted to native types.
     *
     * @var string[]
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'user_id' => 'integer',
        'status' => 'bool',
    ];

    /**
     * The fillable properties.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public array $rules = [
        'user_id' => 'required|int',
        'name' => 'required|string',
        'description' => 'nullable|string',
        'status' => 'bool',
    ];

    /**
     * @var array
     */
    protected $appends = ['avatars'];

    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class, 'group_users');
    }
}
