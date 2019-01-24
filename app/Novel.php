<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    public function user(){
      return $this->belongsTo(User::class);
    }

    public function chapters(){
      return $this->hasMany(Chapter::class);
    }

    public function reviews(){
      return $this->hasMany(NovelReview::class);
    }


    /*
      CUSTOM METHODS
    */
    public function makeExcerpt($len = 600){
       return (strlen($this->description) > 600) ? substr($this->description, 0, $len) . ' ...' : $this->description;
    }
}
