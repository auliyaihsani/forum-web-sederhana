<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
      protected $fillable = ['id','name'];

      public function forums()
      {
      return $this->belongsToMany('App\Forum');
    }
}
