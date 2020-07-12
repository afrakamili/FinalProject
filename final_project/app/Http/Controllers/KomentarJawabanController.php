<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KomentarJawaban;
use App\Pertanyaan;

class KomentarJawabanController extends Controller
{
    //
    public function create(){
        return view('page.buatkomentar');
    }

    public function index(){
        //return view ('page.')
    }

    public function store(Request $request){
        // dd ('masuk');
        // dd($request->id_jawaban);
        $new_komentar = KomentarJawaban::create([
            "komentar"=> $request ["komentar"],
            "id_tukangkomen" => $request ["id_tukangkomen"],
            "id_jawaban" => $request ["id_jawaban"],
        ]);

        
        return redirect('/pertanyaan');
    }
    
}
