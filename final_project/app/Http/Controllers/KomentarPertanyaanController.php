<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KomentarPertanyaan;
use App\Pertanyaan;
use App\Jawaban;


class KomentarPertanyaanController extends Controller
{
    //
    public function create(){
        return view();
    }

    public function index(){
        //return view ('page.')
    }

    public function store(Request $request){
        //dd ($request);
        $new_komentar = KomentarPertanyaan::create([
            "komentar"=> $request ["komentar"],
            "id_tukangkomen" => $request ["id_tukangkomen"],
            "id_pertanyaan" => $request ["id_pertanyaan"]
        ]);
        return redirect('/pertanyaan');
    }
}
