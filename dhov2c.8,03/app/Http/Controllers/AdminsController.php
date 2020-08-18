<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Operator;
use App\Meeting;
use App\Audience;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operators = Operator::all();
        return view('admin/index', compact('operators'));
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
    public function store(Request $request, Operator $operator)
    {


        $request->validate([
            'nama_instansi' => 'required',
            'nama_operator' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
            'konfirmasiPassword' => 'required|same:password'
        ],
        [
            'nama_instansi.required' => 'Nama instansi tidak boleh kosong!',
            'nama_operator.required' => 'Nama operator tidak boleh kosong!',
            'username.required' => 'Username tidak boleh kosong!',
            'password.min' => 'Password minimal 6 karakter',
            'password.required' => 'Password tidak boleh kosong!',
            'konfirmasiPassword.required' => 'Konfirmasi password tidak boleh kosong!',
            'konfirmasiPassword.same' => 'Konfirmasi password Anda tidak sesuai dengan password Anda!'
        ]);

        if(request()->has('foto')){
            $gambaruploaded = request()->file('foto');
            $gambarname = time() .'.'. $gambaruploaded->getClientOriginalName();
            $gambarpath = public_path('/image/');
            $gambaruploaded->move( $gambarpath, $gambarname );
            Operator::create([
                'nama_instansi' => $request->nama_instansi,
                'nama_operator' => $request->nama_operator,
                'username' => $request->username,
                'password' => $request->password,
                'foto'=>$gambarname,
            ]);
        }

        // $operator->nama_instansi = $request->nama_instansi;
        // $operator->nama_operator = $request->nama_operator;
        // $operator->username = $request->username;
        // $operator->password = $request->password;
        // $operator->foto = $request->foto;


        // $operator->save();

        return redirect('/admin')->with('status', 'Data Operator Berhasil Ditambahkan!');
    }

    public function store_meeting(Request $request)
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
        $meeting->maker = '1';

        $meeting->save();

        return back()->with('status', 'Rapat berhasil ditambahkan!');
        //return redirect('/admin/opr/$operator')->with('status', 'Rapat berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Operator $operator)
    {
        return view('/admin/eprofil', compact('operator'));
    }

    public function show_opd(Operator $operator, Meeting $meeting)
    {
        $md = Meeting::all()
            ->where('status', '=', 'Dibuat');

        $mb = Meeting::all()
            ->where('status', '=', 'Berlangsung');

        $ms = Meeting::all()
            ->where('status', '=', 'Selesai');

        $mg = Meeting::all()
            ->where('status', '=', 'Batal');

        $waktu = Audience::all();

        return view('admin.indexopd', compact('operator', 'md', 'mb', 'ms', 'mg', 'waktu'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Operator $operator)
    {
        return view('admin/eprofil2', compact('operator'));
    }
    public function edit_password(Operator $operator){
        return view('admin/epassword', compact('operator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operator $operator)
    {


        $request->validate([
            'nama_instansi' => 'required',
            'nama_operator' => 'required',
            'username' => 'required',
            'foto' => 'required'
        ],
        [
        'nama_instansi.required' => 'Nama instansi tidak boleh kosong!',
        'nama_operator.required' => 'Nama operator tidak boleh kosong!',
        'username.required' => 'Username telah digunakan!'
    ]);

        if(request()->has('foto')){
            $gambaruploaded = request()->file('foto');
            $gambarname = time() .'.'. $gambaruploaded->getClientOriginalName();
            $gambarpath = public_path('/image/');
            $gambaruploaded->move( $gambarpath, $gambarname );
            Operator::where('id', $operator->id)
                ->update([
                    'nama_instansi' => $request->nama_instansi,
                    'nama_operator' => $request->nama_operator,
                    'username' => $request->username,
                    'foto'=>$gambarname,
            ]);
        }

        return redirect('/admin')->with('status', 'Data Operator Berhasil Diperbaharui!');
     }

     public function update_password(Request $request, Operator $operator){
         $request->validate([
            'password' => 'required|min:6',
            'konfirmasiPassword' => 'required|same:password'
         ],
         [
            'password.min' => 'Password minimal 6 karakter',
            'password.required' => 'Password tidak boleh kosong!',
            'konfirmasiPassword.required' => 'Konfirmasi password tidak boleh kosong!',
            'konfirmasiPassword.same' => 'Konfirmasi password Anda tidak sesuai dengan password Anda!',
         ]);

        Operator::where('id', $operator->id)
        ->update([
            'password' => $request->password
        ]);
        return redirect('/admin')->with('status', 'Password Berhasil Diperbaharui!');
     }

    public function update_rapat(Request $request, Meeting $meeting)
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

        return redirect('/admin')->with('status', 'Rapat berhasil diperbaharui!');
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

            return redirect('/admin')->with('status', 'Rapat Telah Dimulai');
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
        return redirect('/admin')->with('status', 'Rapat Telah Dibatalkan!');
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
        return redirect('/admin')->with('status', 'Rapat Telah Diakhiri!');
    }

    public function update_notulen(Meeting $meeting){

        if(request()->has('notulen')){
            $notulenuploaded = request()->file('notulen');
            $notulenname = time() .'.'. $notulenuploaded->getClientOriginalName();
            $notulenpath = public_path('/notulen/');
            $notulenuploaded->move( $notulenpath, $notulenname );
            Meeting::where('id_rapat', $meeting->id_rapat)
                ->update([
                    'nama_kegiatan' => $meeting->nama_kegiatan,
                    'tanggal' => $meeting->tanggal,
                    'waktu' => $meeting->waktu,
                    'tempat' => $meeting->tempat,
                    'pimpinan_rapat' => $meeting->pimpinan_rapat,
                    'notulis' => $meeting->notulis,
                    'kesimpulan' => $meeting->kesimpulan,
                    'status' => $meeting->status,
                    'notulen' => $notulenname,
            ]);
        }

        return back()->with('status', 'Notulen Berhasil Diupload');

    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operator $operator)
    {
        Operator::destroy($operator->id);
        return redirect('/admin')->with('status', 'Data Operator Berhasil Dihapus!');
    }
}
