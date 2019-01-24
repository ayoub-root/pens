<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function novel(){
      return $this->belongsTo(Novel::class);
    }

    public function comments(){
      return $this->hasMany(ChapterComment::class);
    }
}
