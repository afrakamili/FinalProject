<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VoteJawaban;
use App\VotePertanyaan;
use App\Models\UserModel;
use App\Models\JawabanModel;

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
        $idpertanyaan = $request->pertanyaan_id;
        $update_reputasi = UserModel::update_reputasi4($id);
        return redirect ('/jawaban/'.$idpertanyaan);
    }

    public function votedownpertanyaan(Request $request){
        
        $vote = VotePertanyaan::create([
            "pertanyaan_id"=> $request ["pertanyaan_id"],
            "user_id" => $request["user_id"],
            "vote" => -1,
        ]);
        $id= $request->user_id;
        $update_reputasi = UserModel::update_reputasi5($id);
        $idpertanyaan = $request->pertanyaan_id;
        return redirect ('/jawaban/'.$idpertanyaan);
        
    }

    // -- vote jawaban ---
    public function voteupjawaban(Request $request){
        
        $vote = VoteJawaban::create([
            "jawaban_id"=> $request ["jawaban_id"],
            "user_id" => $request["user_id"],
            "vote" => 1,
        ]);
        $id= $request->id_penjawab;
        $id_jawaban = $request->jawaban_id;
        $update_reputasi = UserModel::update_reputasi4($id);
        $update_votes = JawabanModel::update_vote($id_jawaban);
        $idpertanyaan = $request->id_pertanyaan;
        return redirect ('/jawaban/'.$idpertanyaan);
    }

    public function votedownjawaban(Request $request){
        
        $vote = VoteJawaban::create([
            "jawaban_id"=> $request ["jawaban_id"],
            "user_id" => $request["user_id"],
            "vote" => -1,
        ]);
        $id= $request->user_id;
        $id_jawaban = $request->jawaban_id;
        $update_reputasi = UserModel::update_reputasi5($id);
        $update_votes = JawabanModel::update_vote1($id_jawaban);
        $idpertanyaan = $request->id_pertanyaan;
        return redirect ('/jawaban/'.$idpertanyaan);
        
    }



}
