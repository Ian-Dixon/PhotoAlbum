<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';
    protected $primaryKey = 'albumKey';

    public function photos() {
      return $this->hasMany('App\Photo', 'albumKey');
    }

    public static function findOrCreate($title) {
      $obj = static::where('title', $title)->first();
      return $obj ?: new static;
    }
}
