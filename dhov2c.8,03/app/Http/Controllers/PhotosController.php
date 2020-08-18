<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Meeting;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Meeting $meeting)
    {
        if(request()->has('foto_rapat')){
            $fotouploaded = request()->file('foto_rapat');
            $fotoname = time() .'.'. $fotouploaded->getClientOriginalName();
            $fotopath = public_path('/image/');
            $fotouploaded->move( $fotopath, $fotoname );
            Photo::create([
                    'id_rapat' => $meeting->id_rapat,
                    'foto' => $fotoname,
            ]);
        }

        return back()->with('status', 'Foto Berhasil Diupload');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        Photo::destroy($photo->id_foto);
        return back()->with('status', 'Foto Berhasil Dihapus');
    }
}
