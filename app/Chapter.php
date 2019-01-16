<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function novel(){
      return $this->hasOne(Novel::class);
    }
}
