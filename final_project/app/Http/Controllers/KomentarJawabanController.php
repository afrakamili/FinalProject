<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KomentarJawaban;

class KomentarJawabanController extends Controller
{
    //
    public function create(){
        return view('page.buatkomentar');
    }

    public function index(){
        //return view ('page.')
    }

    public function store(){
        $new_komentar = KomentarJawaban::create([
            "komentar"=> $request ["komentar"],
            "id_tukangkomen" => $request ["id_tukangkomen"],
        ]);
        return redirect('/pertanyaan');
    }
    
}
