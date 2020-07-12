<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
class JawabanModel{

  public static function find_by_pertanyaan_id ($id_pertanyaan){
      $jawaban = DB::table('jawabans')->where('id_pertanyaan', $id_pertanyaan)->get();
      return $jawaban;
    }

    public static function update_vote($id){
      $data = DB::table('jawabans')
                      ->where('id',$id)
                      ->first();
      $votesawal = $data->votes;
      //dd($votesawal);
      $tambahvotes = $votesawal+1;
      $updatevotes = DB::update('update jawabans set votes ='. $tambahvotes .' where id = ?', [$id]);
      return $updatevotes;
    } 

    public static function update_vote1($id){
      $data = DB::table('jawabans')
                      ->where('id',$id)
                      ->first();
      $votesawal = $data->votes;
      $tambahvotes = $votesawal-1;
      $updatevotes = DB::update('update jawabans set votes ='. $tambahvotes .' where id = ?', [$id]);
      return $updatevotes;
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