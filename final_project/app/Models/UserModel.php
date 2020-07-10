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
}