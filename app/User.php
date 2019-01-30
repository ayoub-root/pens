<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function novels(){
      return $this->hasMany(Novel::class);
    }

    public function novel_reviews(){
      return $this->hasMany(NovelReview::class);
    }


    public function chapter_comments(){
      return $this->hasMany(ChapterComment::class);
    }

    public function membre_since(){
      $carbon = new Carbon($this->created_at);
      return $carbon->toFormattedDateString();
    }


}
