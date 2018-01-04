<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{

    protected $fillable = ['id','title','post'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function comments()
     {
         return $this->morphMany('App\Comment', 'commentable');
     }

}
