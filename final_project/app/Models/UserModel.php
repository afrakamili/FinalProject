<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
class UserModel{
  public static function get_all(){
    $user = DB::table('users')->get();
    return $user;
  }

  public static function save($data){
    unset($data["_token"]);
    $new_user= DB::table('users')->insert($data);
    return $new_user;
  }

  public static function find_by_id($id){
    $QnA = DB::table('users')
              -> where ('id', $id)
              -> first();
    return $QnA;
  }
  
  public static function update ($id_penanya){
    $user = DB::table('users')
                    -> where ('id', $id_penanya)
                    ->update ([
                      'reputasi'=> DB::raw('reputasi+3'),
                    ]);
    dd($user);
    return $user;
  }

  public static function destroy($id){
    $deleted = DB::table('users')
                  -> where('id', $id)
                  -> delete();
    return $deleted;
  }
}