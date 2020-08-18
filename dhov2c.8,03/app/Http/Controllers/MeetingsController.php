<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\Audience;
use App\Operator;
use App\Photo;
use App\Notulen;

use Carbon\Traits\Timestamp;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $md = Meeting::all()
            ->where('status', '=', 'Dibuat');

        $mb = Meeting::all()
            ->where('status', '=', 'Berlangsung');

        $ms = Meeting::all()
            ->where('status', '=', 'Selesai');

        $mg = Meeting::all()
            ->where('status', '=', 'Batal');

        return view('operator.index', compact('md', 'mb', 'ms', 'mg'));
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

        function RandomString($length) {
            $keys = array_merge(range(0,9), range('A', 'Z'));

            $key = "";
            for($i=0; $i < $length; $i++) {
                $key .= $keys[mt_rand(0, count($keys) - 1)];
            }
            return $key;
        }

        $request->validate([
            'topikRapat' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
            'pimpinanRapat' => 'required',
            'notulisRapat' => 'required',

        ],
        [
            'topikRapat.required' => 'Topik Rapat tidak boleh kosong!',
            'tanggal.required' => 'Tanggal Rapat tidak boleh kosong!',
            'waktu.required' => 'Waktu Rapat tidak boleh kosong!',
            'tempat.required' => 'Tempat Rapat tidak boleh kosong!',
            'pimpinanRapat.required' => 'Pimpinan Rapat tidak boleh kosong!',
            'notulisRapat.required' => 'Notulis Rapat tidak boleh kosong!'
        ]);

        $meeting = new Meeting;

        $meeting->id_opt = $request->id_Opd;
        $meeting->kode_rapat = RandomString(6);
        $meeting->nama_kegiatan = $request->topikRapat;
        $meeting->tanggal = $request->tanggal;
        $meeting->waktu = $request->waktu;
        $meeting->tempat = $request->tempat;
        $meeting->pimpinan_rapat = $request->pimpinanRapat;
        $meeting->notulis = $request->notulisRapat;
        $meeting->status = 'Dibuat';

        $meeting->save();

        return redirect('/operator')->with('status', 'Rapat berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        return view('operator.drapat', compact('meeting'));
    }
    public function show_dbrapat(Meeting $meeting)
    {
        $audiences = Audience::all();

        $photo = Photo::all();

        return view('operator.dbrapat', compact('meeting', 'audiences', 'photo'));
    }
    public function show_drrapat(Meeting $meeting)
    {
        $notulen = Notulen::all();

        $audiences = Audience::all();

        $photo = Photo::where('id_rapat', $meeting->id_rapat)
                    ->get('foto');

        // return $photo;

        return view('operator.drrapat', compact('meeting', 'audiences', 'photo', 'notulen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        return view('operator.erapat', compact('meeting'));
    }
    public function edit_profil(Meeting $meeting)
    {
        return view('operator.eprofil', compact('meeting'));
    }
    public function edit_profil2(Meeting $meeting)
    {
        return view('operator.eprofil2', compact('meeting'));
    }
    public function edit_epassword(Meeting $meeting)
    {
        return view('operator.epassword', compact('meeting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {
        Meeting::where('id_rapat', $meeting->id_rapat)
                ->update([
                    'nama_kegiatan' => $request->topikRapat,
                    'tanggal' => $request->tanggal,
                    'waktu' => $request->waktu,
                    'tempat' => $request->tempat,
                    'pimpinan_rapat' => $request->pimpinanRapat,
                    'notulis' => $request->notulisRapat,
                ]);

        return redirect('/operator')->with('status', 'Rapat berhasil diperbaharui!');
    }

    public function update_stat_mulai(Meeting $meeting){

        $date = date('Y-m-j H:i:s');


        Meeting::where('id_rapat', $meeting->id_rapat)
                ->update([
                    'nama_kegiatan' => $meeting->nama_kegiatan,
                    'tanggal' => $meeting->tanggal,
                    'waktu' => $meeting->waktu,
                    'tempat' => $meeting->tempat,
                    'pimpinan_rapat' => $meeting->pimpinan_rapat,
                    'notulis' => $meeting->notulis,
                    'status' => 'Berlangsung',
                    'started_at' => $date,
                ]);

            return redirect('/operator')->with('status', 'Rapat Telah Dimulai!');
    }

    public function update_stat_batal(Meeting $meeting){

        $date = date('Y-m-j H:i:s');

        Meeting::where('id_rapat', $meeting->id_rapat)
                ->update([
                    'nama_kegiatan' => $meeting->nama_kegiatan,
                    'tanggal' => $meeting->tanggal,
                    'waktu' => $meeting->waktu,
                    'tempat' => $meeting->tempat,
                    'pimpinan_rapat' => $meeting->pimpinan_rapat,
                    'notulis' => $meeting->notulis,
                    'status' => 'Batal',
                    'ended_at' => $date,
                ]);
        return redirect('/operator')->with('status', 'Rapat Telah Dibatalkan!');
    }

    public function update_stat_selesai(Request $request, Meeting $meeting){

        $request->validate([
            'kesimpulan' => 'required',
        ],
        [
            'kesimpulan.required' => 'Berikan Kesimpulan Rapat',
        ]);


        $date = date('Y-m-j H:i:s');

        Meeting::where('id_rapat', $meeting->id_rapat)
                ->update([
                    'nama_kegiatan' => $meeting->nama_kegiatan,
                    'tanggal' => $meeting->tanggal,
                    'waktu' => $meeting->waktu,
                    'tempat' => $meeting->tempat,
                    'pimpinan_rapat' => $meeting->pimpinan_rapat,
                    'notulis' => $meeting->notulis,
                    'kesimpulan' => $request->kesimpulan,
                    'status' => 'Selesai',
                    'ended_at' => $date,
                ]);
        return redirect('/operator')->with('status', 'Rapat Telah Diakhiri!');
    }

    public function update_profil(Request $request){

        $request->validate([
            'nama_instansi' => 'required',
            'nama_operator' => 'required',
            'username' => 'required',
            'foto' => 'required',
        ]);

        if(request()->has('foto')){
            $gambaruploaded = request()->file('foto');
            $gambarname = time() .'.'. $gambaruploaded->getClientOriginalName();
            $gambarpath = public_path('/image/');
            $gambaruploaded->move( $gambarpath, $gambarname );
            Operator::where('id', $request->id)
                ->update([
                    'nama_instansi' => $request->nama_instansi,
                    'nama_operator' => $request->nama_operator,
                    'username' => $request->username,
                    'foto'=>$gambarname,
            ]);
        }

        return redirect('/operator')->with('status', 'Data Operator Berhasil Diperbaharui!');
    }

    public function update_password(Request $request){
         $request->validate([
            'password' => 'required',
            'konfirmasiPassword' => 'same:password'
        ]);

        Operator::where('id', $request->id)
        ->update([
            'password' => $request->password
        ]);
        return redirect('/operator')->with('status', 'Password Berhasil Diperbaharui!');
    }


            /**
             * Remove the specified resource from storage.
             *
             * @param  \App\Meeting  $meeting
             * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        // Meeting::destroy($meeting->id_rapat);
        // return redirect('/operator')->with('status', 'Rapat Berhasil Dibatalkan!');
    }



}
