@extends('layout.header')

<title>Bukti Rapat</title>

@section('bca')

    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">List OPD</li>
        <li class="breadcrumb-item active" aria-current="page">Absensi Rapat</li>
    </ol>

@endsection

@section('bc')

    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/operator">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Absensi Rapat</li>
    </ol>

@endsection

@section('container')

    <div class="page-header">
        <h3 class="left_space">Bukti Rapat</h3><hr>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ $meeting->id_rapat }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf

        <div class="row">
            <div id="grid-system2" class="col-sm-8">
                <div >
                    <div id="grid-system2-body">

                        <table id="w0" class="table table-borderless">
                            <tbody>
                               <tr><th style="width: 200px;">Nama Kegiatan       </th><td><input type="text" class="form-control col-10" readonly value="{{ $meeting->nama_kegiatan }}"></td></tr>
                                <tr><th>Tanggal             </th><td><input type="text" class="form-control col-10" readonly value="{{ $meeting->tanggal }}"></td></tr>
                                <tr><th>Pukul               </th><td><input type="text" class="form-control col-10" readonly value="{{ $meeting->waktu }}"></td></tr>
                                <tr><th>Tempat              </th><td><input type="text" class="form-control col-10" readonly value="{{ $meeting->tempat }}"></td></tr>
                                <tr><th>Pimpinan Rapat      </th><td><input type="text" class="form-control col-10" readonly value="{{ $meeting->pimpinan_rapat }}"></td></tr>
                                <tr><th>Notulis Rapat       </th><td><input type="text" class="form-control col-10" readonly value="{{ $meeting->notulis }}"></td></tr>
                                <tr><th>Kode Rapat          </th><td><input type="text" class="form-control col-10" readonly value="{{ $meeting->kode_rapat }}"></td></tr>
                                <tr><th><button type="submit" class="btn btn-secondary mr-4">Upload Foto</button></th><td><input type="file" id="foto_rapat" name="foto_rapat"></td></tr>

    </form>

                                <form action="{{ $meeting->id_rapat }}" method="post" class="d-inline">
                                    @method('put')
                                    @csrf
                                <tr><th>Kesimpulan          </th>
                                    <td>
                                        <p><textarea name="kesimpulan" id="kesimpulan" cols="52" rows="2" class="@error('nama_operator') is-invalid @enderror"></textarea></p>
                                        @error('nama_operator')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row col-sm-8">
                            <div class="form-group col-sm-8">
                                    <button type="submit" class="btn btn-danger">Akhiri</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div>
        <h4 class="left_space">Daftar Foto</h4><hr>
    </div>
    <div class="row col-sm-12  ml-2 mt-1">
        @foreach($photo as $foto)
            @if($foto->id_rapat == $meeting->id_rapat)
                <form action="{{ $foto->id_foto }}/foto" method="POST">
                    @method('delete')
                    @csrf
                    <div id="grid-system2-body" class="box-body">
                        <img src="{{ asset('image')}}/{{$foto->foto }}" width="250" alt="foto" class="rounded mr-3 mt-3 box">
                        <div class="mt-2">
                            <button type="submit" class="btn btn-danger">Hapus Foto</button>
                        </div>
                    </div>
                </form>
            @endif
        @endforeach
    </div>
    <hr>

    <br>

    <div>
        <h4 class="left_space">Daftar Peserta</h4><hr>
    </div>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Instansi</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($audiences as $audience)
                    @if ($audience->id_rapat == $meeting->id_rapat)
                        {{-- @if($audience->created_at > $meeting->started_at) --}}
                        <tr>
                            <td>{{ $audience->nip }}</td>
                            <td>{{ $audience->nama }}</td>
                            <td>{{ $audience->instansi }}</td>
                            <td>{{ $audience->jabatan }}</td>

                            <form action="{{ $audience->nip }}/audience" method="POST">
                                @method('delete')
                                @csrf
                                <td><button type="submit" class="btn fas fa-window-close fa-lg" style="color: red;"></button></td>
                            </form>
                        </tr>
                        {{-- @endif --}}
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
