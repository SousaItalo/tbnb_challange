<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class House
 * @package App
 *
 * @property string $name
 * @property string $address
 * @property integer $host_id
 * @property-read Collection|Cleaner[] $cleaners
 * @property-read Host $host
 * @property-read integer $id
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 *
 */
class House extends Model
{
    protected $fillable = ['name', 'address', 'host_id'];

    protected $dates = ['created_at', 'updated_at'];

    protected $appends = ['next_cleaning'];

    public function host()
    {
        return $this->belongsTo(Host::class);
    }

    public function cleaners()
    {
        return $this->belongsToMany(
            Cleaner::class,
            'cleaners_houses',
            'house_id',
            'cleaner_id'
        );
    }

    public function cleanings()
    {
        return $this->hasMany(CleaningProject::class);
    }

    public function getNextCleaningAttribute()
    {
        return $this->cleanings()->orderBy('created_at', 'desc')->first();
    }
}
