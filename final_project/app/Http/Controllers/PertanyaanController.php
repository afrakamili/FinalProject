<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\Tag;
use App\User2;
use App\Models\UserModel;
use App\Jawaban;
use App\KomentarJawaban;
use App\Models\JawabanModel;
use App\Models\PertanyaanModel;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = User2::all();
        //$pertanyaan = Pertanyaan::find($id);
        $pertanyaan = Pertanyaan::all();
        //dd ($pertanyaan);
        //$pertanyaan = UserModel::get_pertanyaan();
        //dd($pertanyaan);
        return view('page.daftarpertanyaan', compact('pertanyaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.buatpertanyaan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //update reputasi user
        $id = $request->id_penanya;
        $update_reputasi = UserModel::update_reputasi($id);
        // $user = UserModel::update($request->id_penanya);
        $new_pertanyaan = Pertanyaan::create([
            "judul"=> $request["judul"],
            "isi"=> $request ["isi"],
            "id_penanya"=>$request["id_penanya"],

        ]);
        //tags
        $tagArr = explode(',', $request->tag);
        $tagsMulti = [];
        foreach($tagArr as $strTag){
            $tagArrAssc["tag_name"] = $strTag;
            $tagsMulti[] = $tagArrAssc;
        }
        
        foreach($tagsMulti as $tagCheck){
            $tag = Tag::firstOrCreate($tagCheck);
            $new_pertanyaan->tags()->attach($tag->id);
        }
        
        //pertanyaan
        
        return redirect('/pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $jawaban = JawabanModel::find_by_pertanyaan_id($id);
        $jawabans = Jawaban::where('id_pertanyaan', $id);
        $komentar = KomentarJawaban::where('id_jawaban',$id);
        //dd($jawabans);
        //dd($komentar);
        return view('page.tanyajawab', compact('pertanyaan','jawaban','komentar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        return view('page.editpertanyaan', compact('pertanyaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pertanyaan = PertanyaanModel::update($id, $request->all());
        return redirect('/pertanyaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Pertanyaan::where('id', $id)->delete();
        return redirect('/pertanyaan');
    }
}
