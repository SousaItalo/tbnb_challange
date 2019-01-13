<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CleaningProject extends Model
{
  protected $fillable = ['start', 'end', 'house_id', 'cleaner_id'];

  public function cleaner()
  {
    return $this->belongsTo(Cleaner::class);
  }

  public function house()
  {
    return $this->belongsTo(House::class);
  }
}
