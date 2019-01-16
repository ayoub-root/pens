<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChapterComment extends Model
{
    public function user(){
      return $this->belongsTo(User::class);
    }

    public function chapter(){
      return $this->belongsTo(Chapter::class);
    }
}
