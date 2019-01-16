<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    public function user(){
      return $this->belongsTo(User::class);
    }

    public function comments(){
      return $this->hasMany(Chapter::class);
    }

    public function reviews(){
      return $this->hasMany(NovelReview::class);
    }
}
