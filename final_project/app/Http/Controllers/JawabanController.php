<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JawabanModel;
use App\Models\UserModel;
use App\Jawaban;
use App\Pertanyaan;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $jawaban = JawabanModel::find_by_pertanyaan_id($id);
        $pertanyaan = Pertanyaan::find($id);
        

        //$pertanyaan = Pertanyaan::find($id);
        
        return view('page.tanyajawab', compact('jawaban', 'pertanyaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //update reputasi
        $id = $request->id_penjawab;
        $idpertanyaan = $request->id_pertanyaan;
        $update_reputasi = UserModel::update_reputasi2($id);
        $new_jawaban = Jawaban::create([
            "jawaban"=> $request ["jawaban"],
            "id_pertanyaan" => $request ["id_pertanyaan"],
            "id_penjawab" => $request ["id_penjawab"],
        ]);
        return redirect('/jawaban/'.$idpertanyaan);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
