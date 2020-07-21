<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function comments(){
      return $this->hasMany('App\Comment');
    }
    public function photo(){
      return $this->belongsTo('App\Photo');
    }
}
