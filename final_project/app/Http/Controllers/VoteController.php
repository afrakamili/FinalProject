<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VoteJawaban;
use App\VotePertanyaan;
use App\Models\UserModel;

class VoteController extends Controller
{

    // -- vote pertnyaan ---
    public function voteuppertanyaan(Request $request){

        $vote = VotePertanyaan::create([
            "pertanyaan_id"=> $request ["pertanyaan_id"],
            "user_id" => $request["user_id"],
            "vote" => 1,
        ]);
        $id= $request->id_penanya;
        
        $update_reputasi = UserModel::update_reputasi4($id);
        return redirect ('/pertanyaan');
    }

    public function votedownpertanyaan(Request $request){
        
        $vote = VotePertanyaan::create([
            "pertanyaan_id"=> $request ["pertanyaan_id"],
            "user_id" => $request["user_id"],
            "vote" => -1,
        ]);
        $id= $request->user_id;
        $update_reputasi = UserModel::update_reputasi5($id);

        return redirect ('/pertanyaan');
        
    }

    // -- vote jawaban ---
    public function voteupjawaban(Request $request){
        
        $vote = VoteJawaban::create([
            "jawaban_id"=> $request ["jawaban_id"],
            "user_id" => $request["user_id"],
            "vote" => 1,
        ]);
        $id= $request->id_penjawab;
        
        $update_reputasi = UserModel::update_reputasi4($id);
        return redirect ('/pertanyaan');
    }

    public function votedownjawaban(Request $request){
        
        $vote = VoteJawaban::create([
            "jawaban_id"=> $request ["jawaban_id"],
            "user_id" => $request["user_id"],
            "vote" => -1,
        ]);
        $id= $request->user_id;
        $update_reputasi = UserModel::update_reputasi5($id);

        return redirect ('/pertanyaan');
        
    }



}
