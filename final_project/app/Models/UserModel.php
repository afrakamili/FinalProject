<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
class UserModel{
  public static function update ($id_penanya){
    $user = DB::table('users')
                    -> where ('id', $id_penanya)
                    ->update ([
                      'reputasi'=> DB::raw('reputasi+3'),
                    ]);
    return $user;
  }

  public static function destroy($id){
    $deleted = DB::table('users')
                  -> where('id', $id)
                  -> delete();
    return $deleted;
  }
    
  public static function get_pertanyaan(){
    $pertanyaan = DB::table('pertanyaans')
                    ->select('pertanyaans.*','users.name as penanya')
                    ->join('users','pertanyaans.id_penanya','=','users.id')
                    ->get();
    return $pertanyaan;
  }

  public static function update_reputasi($id){
    $data = DB::table('users')
                    ->where('id',$id)
                    ->first();
    $repuawal = $data->reputasi;
    $tambahrepu = $repuawal+3;
    $updaterepu = DB::update('update users set reputasi ='. $tambahrepu .' where id = ?', [$id]);
    return $updaterepu;
  }

  
  public static function update_reputasi2($id){
    $data = DB::table('users')
                    ->where('id',$id)
                    ->first();
    $repuawal = $data->reputasi;
    $tambahrepu = $repuawal+5;
    $updaterepu = DB::update('update users set reputasi ='. $tambahrepu .' where id = ?', [$id]);
    return $updaterepu;
  }

  public static function update_reputasi3($id){
    $data = DB::table('users')
                    ->where('id',$id)
                    ->first();
    $repuawal = $data->reputasi;
    $tambahrepu = $repuawal+15;
    $updaterepu = DB::update('update users set reputasi ='. $tambahrepu .' where id = ?', [$id]);
    return $updaterepu;
  }
}