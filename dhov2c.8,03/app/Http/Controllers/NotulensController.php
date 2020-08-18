<?php

namespace App\Http\Controllers;

use App\Notulen;
use App\Meeting;
use App\Audience;
use App\Photo;

use PDF;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotulensController extends Controller
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
    public function store(Meeting $meeting)
    {
        if(request()->has('notulen')){
            $notulenuploaded = request()->file('notulen');
            $notulenname = time() .'.'. $notulenuploaded->getClientOriginalName();
            $notulenpath = public_path('/notulen/');
            $notulenuploaded->move( $notulenpath, $notulenname );
            Notulen::create([
                    'id_rapat' => $meeting->id_rapat,
                    'notulen' => $notulenname,
            ]);
        }

        return back()->with('status', 'Notulen Berhasil Diupload');
    }

    public function download_file(Request $request, Notulen $notulen){

        $nama_file = $notulen->notulen;

        // $file_path = public_path('notulen'.$notulen->notulen);
        return Response()->download(public_path('notulen/'. $nama_file));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        $notulen = Notulen::all();

        return view('operator.notulen', compact('meeting', 'notulen'));
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
    public function destroy(Notulen $notulen)
    {
        // Notulen::destroy($notulen->id_notulen);
        // return back()->with('status', 'Dokumen Notulen Berhasil Dihapus Dari Daftar');
    }

    public function cetak_pdf(Meeting $meeting){

        $audiences = Audience::all();

        $photo = Photo::all();

        $notulen = Notulen::all();
        // $photo = Photo::where('id_rapat', $meeting->id_rapat)
        //             ->get('foto');

        // foreach($photo as $photos){
        //     if($photo->id_rapat == $meeting->id_rapat){

        //     }
        // }

    	$pdf = PDF::loadview('cetak', compact('meeting', 'audiences', 'photo', 'notulen'));
        return $pdf->stream('absensi.pdf');
    }
}
