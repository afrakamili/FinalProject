<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\Tag;
use App\User2;
use App\Models\UserModel;

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
        // $user = UserModel::update($request->id_penanya);
        $new_pertanyaan = Pertanyaan::create([
            "judul"=> $request["judul"],
            "isi"=> $request ["isi"],

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
        //
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
