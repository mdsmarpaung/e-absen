<?php

namespace App\Http\Controllers;

use App;
use App\Audience;
use App\Meeting;
use Illuminate\Http\Request;

class AudiencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('peserta.index');
    }
    public function index_akhir()
    {
        return view('peserta.penutup');
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
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'instansi' => 'required',
            'jabatan' => 'required'

        ]);

        $audience = new Audience;

        $audience->nip = $request->nip;
        $audience->nama = $request->nama;
        $audience->instansi = $request->instansi;
        $audience->jabatan = $request->jabatan;
        $audience->id_rapat = $request->id_rapat;

        $audience->save();

        return redirect('/penutup');//->with('status', 'Rapat berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Audience  $audience
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $meet = Meeting::all();
        $kode = $request->input('kodeRapat');

        $stat = Meeting::all('status');

        // $md = Meeting::all()
        //     ->where('status', '=', 'Dibuat');

        // $mb = Meeting::all()
        //     ->where('status', '=', 'Berlangsung');

        // $ms = Meeting::all()
        //     ->where('status', '=', 'Selesai');

        //$stat = Meeting::status(); salah

        return view('peserta.form', compact('meet', 'kode','stat'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Audience  $audience
     * @return \Illuminate\Http\Response
     */
    public function edit(Audience $audience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Audience  $audience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audience $audience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Audience  $audience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audience $audience)
    {
        Audience::destroy($audience->nip);
        return back()->with('status', 'Peserta Berhasil Dihapus Dari Daftar');
    }
}
