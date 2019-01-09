<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Host
 * @package App
 *
 * @property Collection|House[] $houses
 * @property-read integer $id
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read User $user
 * @property-read string $name
 */
class Host extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    protected $appends = ['name'];

    public function houses()
    {
        return $this->hasMany(House::class);
    }

    public function cleaners()
    {
        return $this->belongsToMany(
            Cleaner::class,
            'cleaners_hosts',
            'host_id',
            'cleaner_id'
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNameAttribute()
    {
        return $this->user->name;
    }
}
