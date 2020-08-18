@extends('layout.header')

<title>Detail Rapat</title>

@section('bca')

    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">List OPD</li>
        <li class="breadcrumb-item active" aria-current="page">Detail Rapat</li>
    </ol>

@endsection

@section('bc')

    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/operator">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Rapat</li>
    </ol>

@endsection

@section('container')

    <div class="page-header">
        <h3 class="left_space">Detail Rapat</h3><hr>
    </div>

    <div>
        <div id="grid-system2" class="col-sm-10">
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
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="row col-sm-8">
        <div class="form-group ml-3 mr-2">
            <form action="{{ $meeting->id_rapat }}" method="POST">
                @method('put')
                @csrf
                <button class="btn btn-success my-2 my-sm-0">Mulai</button>
            </form>
        </div>
        <div class="form-group mr-2">
            <button class="btn btn-info my-2 my-sm-0"><a href="/admin/opr/erapat/{{ $meeting->id_rapat }}" class="text-white">Edit</a></button>
        </div>
        <div class="form-group">
            <form action="batal/{{ $meeting->id_rapat }}" method="POST">
                @method('put')
                @csrf
                <button class="btn btn-danger my-2 my-sm-0">Batal</button>
            </form>
        </div>
    </div>

@endsection
