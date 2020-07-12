<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    public function pertanyaan(){
        return $this->belongsTo('App\Pertanyaan');
    }
    protected $guarded=[];

    public function user(){
        return $this->belongsTo('App\User2' , 'id_penjawab');
    }

    public function komentar(){
        return $this->hasMany('App\KomentarJawaban', 'id_jawaban');
    }
}
