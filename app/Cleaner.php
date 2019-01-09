<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cleaner
 * @package App
 *
 * @property Collection|House[] $houses
 * @property-read integer $id
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read User $user
 * @property-read string $name
 */
class Cleaner extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    public function houses()
    {
        return $this->belongsToMany(
            House::class,
            'cleaners_houses',
            'cleaner_id',
            'house_id'
        );
    }

    public function hosts()
    {
        return $this->belongsToMany(
            Host::class,
            'cleaners_hosts',
            'cleaner_id',
            'host_id'
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cleanings()
    {
        return $this->hasMany(CleaningProject::class);
    }

    public function getNameAttribute()
    {
        return $this->user->name;
    }

}
