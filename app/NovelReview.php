<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NovelReview extends Model
{
    public function user(){
      return $this->belongsTo(User::class);
    }

    public function novel(){
      return $this->belongsTo(Novel::class);
    }
}
