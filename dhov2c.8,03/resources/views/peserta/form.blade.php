@extends('layout.main')

<title>Form Absensi</title>

<div class="container p-3 my-3 border">
    <img src="{{ asset('image/logo.jpg') }}" class="logo_lgn" width="90px" >
    <br>
    <h3 align="center">Form Absensi</h3>

    @foreach ($meet as $meeting)
        @if($kode == $meeting->kode_rapat)
            @switch($meeting->status)
                @case("Berlangsung")

                    <div class="mt-3">
                        <p class="box judul_absen">Detail Rapat</p>
                    </div>
                    <br>

                    <table id="w0" class="table table-borderless">
                        <tbody>
                            <tr><th>Nama Kegiatan       </th><td>{{ $meeting->nama_kegiatan }}</td></tr>
                            <tr><th>Hari/Tanggal        </th><td>{{ $meeting->tanggal }}</td></tr>
                            <tr><th>Waktu               </th><td>{{ $meeting->waktu }}</td></tr>
                            <tr><th>Tempat              </th><td>{{ $meeting->tempat }}</td></tr>
                            <tr><th>Pimpinan Rapat      </th><td>{{ $meeting->pimpinan_rapat }}</td></tr>
                            <tr><th>Notulis Rapat       </th><td>{{ $meeting->notulis }}</td></tr>
                            <tr><th>Kode Rapat          </th><td>{{ $meeting->kode_rapat }}</td></tr>

                        </tbody>
                    </table>

                    <div>
                        <p class="box judul_absen">Form Data Diri Peserta Rapat</p>
                    </div>
                    <br>

                    <form method="POST" action="/peserta/form" class="">
                        @csrf
                        <div class="row my-4">
                            <label for="nip" class="col-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control col-8 @error('nip') is-invalid @enderror" id="nip" name="nip">
                                @error('nip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-4">
                            <label for="nama" class="col-2 col-form-label">Nama Peserta</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control col-8 @error('nama') is-invalid @enderror" id="nama" name="nama">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-4">
                            <label for="instansi" class="col-2 col-form-label">Intansi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control col-8 @error('instansi') is-invalid @enderror" id="instansi" name="instansi">
                                @error('instansi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-4">
                            <label for="jabatan" class="col-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control col-8 @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan">
                                @error('jabatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-sm-10">
                                <input type="text" hidden class="form-control col-8" name="id_rapat" value={{$meeting->id_rapat}}>
                            </div>
                        </div>

                        <div class="row mx-auto d-flex">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success my-2 my-sm-0">Masuk</button>
                            </div>
                            <div class="form-group ml-2">
                                <button type="reset" class="btn btn-danger my-2 my-sm-0">Batal</button>
                            </div>
                        </div>


                    @break
                @case("Selesai")
                    <hr>
                        <div class="my-5">
                        <h4 align="center" style="color:red">Rapat Telah Selesai</h4>
                    </div>
                    @break

                @default
                    <hr>
                    <div class="my-5">
                        <h4 align="center" style="color:red">Rapat Tidak Ditemukan atau Belum Dimulai</h4>
                    </div>
                    </form>
            @endswitch
        @endif
    @endforeach

</div>
