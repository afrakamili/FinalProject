<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
class PertanyaanModel{
  public static function get_all(){
    $pertanyaan = DB::table('pertanyaans')->get();
    return $pertanyaan;
  }

  public static function save($data){
    unset($data["_token"]);
    $new_pertanyaan= DB::table('pertanyaans')->insert($data);
    return $new_pertanyaan;
  }

  public static function find_by_id($id){
    $QnA = DB::table('pertanyaans')
              -> where ('id', $id)
              -> first();
    return $QnA;
  }

  public static function update ($id, $request){
    $pertanyaan = DB::table('pertanyaans')
                    ->where ('id', $id)
                    ->update ([
                      'judul' => $request ["judul"],
                      'isi'=> $request ["isi"],
                    ]);
    return $pertanyaan;
  }

  public static function destroy($id){
    $deleted = DB::table('pertanyaans')
                  -> where('id', $id)
                  -> delete();
    return $deleted;
  }
}