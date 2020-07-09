<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $guarded = [];

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
