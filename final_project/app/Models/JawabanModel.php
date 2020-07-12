<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
class JawabanModel{

  public static function find_by_pertanyaan_id ($id_pertanyaan){
      $jawaban = DB::table('jawabans')->where('id_pertanyaan', $id_pertanyaan)->get();
      return $jawaban;
    }

    public static function update_votes($id){
      $jawabanterbaik = DB::table('jawabans')
                      ->where('id',$id)
                      ->update ([
                         "votes" => 1
                      ]);
      
      return $jawabanterbaik;
    }
  


}