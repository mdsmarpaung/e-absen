@extends('layout.header')

<title>Edit Profil Operator</title>

@section('container')

<div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item left_space"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item left_space"><a href="/admin/eprofil/{{$operator->id}}">Detail Akun</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Akun</li>
    </ol>
    <div class="row">
        <div id="grid-system2" class="col-sm-8">
            <div >
                <div id="grid-system2-body">

                    <table id="w0" class="table ">
                        <tbody>
                        <form method="POST" action="/admin/eprofil/{{ $operator->id }}" class="ml-3" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="ml-3">
                                <h4>Edit Akun {{ $operator->nama_instansi }}</h4>
                            </div>
                            <div class="row my-4">
                                <label for="nama_instansi" class="col-3 col-form-label ml-3">Nama Instansi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control col-10 @error('nama_instansi') is-invalid @enderror" id="nama_instansi" name="nama_instansi" value="{{ $operator->nama_instansi }}">
                                    @error('nama_instansi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row my-4">
                                <label for="nama_operator" class="col-3 col-form-label ml-3">Nama Operator</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control col-10 @error('nama_operator') is-invalid @enderror" id="nama_operator" name="nama_operator" value="{{ $operator->nama_operator }}">
                                    @error('nama_operator')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row my-4">
                                <label for="username" class="col-3 col-form-label ml-3">Username</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control col-10  @error('username') is-invalid @enderror" id="username" name="username" value="{{ $operator->username }}">
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row my-4">
                                <label for="foto" class="col-3 col-form-label ml-3">Upload Foto</label>
                                <div class="col-sm-8">
                                    <input type="file" id="foto" name="foto" value="{{ $operator->foto }}">
                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>


                            <div class="row col-sm-8">
                                <div class="form-group col-sm-auto">
                                    <button type="submit" class="btn btn-primary">Perbaharui</button>
                                </div>
                                <div class="form-group">
                                    <div class="form-group col-sm-auto">
                                        <a href="/admin/eprofil/{{ $operator->id }}" class="btn btn-danger">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


        <div>

            <div id="grid-system2" class="col-sm-3 mt-4">
                <div>
                    <div id="grid-system2-body" class="box-body">
                        <img src="{{ asset('image')}}/{{ $operator->foto }}" width="250" alt="foto" class="rounded">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('footer')
@endsection
