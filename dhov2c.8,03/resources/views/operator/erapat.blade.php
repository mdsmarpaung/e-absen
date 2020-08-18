@extends('layout.header')

<title>Edit Rapat</title>

@section('container')

    <div class="page-header">
        <h3 class="left_space">Edit Rapat</h3><hr>
    </div>


    <div class="row">
        <div id="grid-system2" class="col-sm-10">
            <div>
                <div id="grid-system2-body">

                    <form action="/admin/opr/erapat/{{ $meeting->id_rapat }}" class="ml-3" method="POST">
                        @method('patch')
                        @csrf
                        <div class="row my-4">
                            <label for="topikRapat" class="col-2 col-form-label">Topik Rapat</label>
                            <div class="col-sm-10">
                                <input type="textarea" class="form-control col-8 @error('topikRapat') is-invalid @enderror" id="topikRapat" name="topikRapat" value="{{ $meeting->nama_kegiatan }}">
                                @error('topikRapat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="row my-4">
                            <label for="tanggal" class="col-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control col-3 @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ $meeting->tanggal }}">
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-4">
                            <label for="waktu" class="col-2 col-form-label">Waktu</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control col-2 @error('waktu') is-invalid @enderror" id="waktu" name="waktu" value="{{ $meeting->waktu }}">
                                @error('waktu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-4">
                            <label for="tempat" class="col-2 col-form-label">Tempat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control col-8 @error('tempat') is-invalid @enderror" id="tempat" name="tempat" value="{{ $meeting->tempat }}">
                                @error('tempat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-4">
                            <label for="pimpinanRapat" class="col-2 col-form-label">Pimpinan Rapat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control col-8 @error('pimpinanRapat') is-invalid @enderror" id="pimpinanRapat" name="pimpinanRapat" value="{{ $meeting->pimpinan_rapat }}">
                                @error('pimpinanRapat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-4">
                            <label for="notulisRapat" class="col-2 col-form-label">Notulis Rapat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control col-8 @error('notulisRapat') is-invalid @enderror" id="notulisRapat" name="notulisRapat" value="{{ $meeting->notulis }}">
                                @error('notulisRapat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-auto">
                                <button type="submit" class="btn btn-success my-2 my-sm-0">Simpan</button>
                            </div>
                            <div class="form-group col-sm-auto">
                                <button type="reset" class="btn btn-danger my-2 my-sm-0">Batal</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
