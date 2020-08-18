<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $primaryKey = 'id_rapat';

    protected $fillable = ['id_opt','nama_kegiatan', 'tanggal', 'waktu', 'tempat', 'pimpinan_rapat', 'notulis', 'status'];

    //protected $fillable = ['kode_rapat', 'nama_kegiatan', 'tanggal', 'waktu', 'pimpinan_rapat', 'notulis', 'status'];
    //kalau menggunakan "Meeting::create([]);"
    /*
    **public function audience()
    **{
    **    return $this->hasMany(Audience::class);
    **}
    */
}
