@extends('layout.header')

<title>Edit Profil</title>

@section('bc')

    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/operator">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/operator/eprofil/{{Auth::user()->id}}">Edit Profil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Akun</li>
    </ol>

@endsection

@section('container')

<div class="row">
    <div id="grid-system2" class="col-sm-8">
        <div >
            <div id="grid-system2-body">

                <table id="w0" class="table ">
                    <tbody>
                    <form method="POST" action="/operator/eprofil/{{Auth::user()->id}}" class="ml-3" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="ml-3">
                            <h4>Edit Akun {{Auth::user()->nama_instansi}}</h4>
                        </div>
                        <div class="row my-4">
                            <label for="nama_instansi" class="col-3 col-form-label ml-3">Nama Instansi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control col-10 @error('nama_instansi') is-invalid @enderror" id="nama_instansi" name="nama_instansi" value="{{Auth::user()->nama_instansi}}">
                            </div>
                        </div>
                        <div class="row my-4">
                            <label for="nama_operator" class="col-3 col-form-label ml-3">Nama Operator</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control col-10 @error('nama_operator') is-invalid @enderror" id="nama_operator" name="nama_operator" value="{{Auth::user()->nama_operator}}">
                            </div>
                        </div>
                        <div class="row my-4">
                            <label for="username" class="col-3 col-form-label ml-3">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control col-10  @error('username') is-invalid @enderror" id="username" name="username" value="{{Auth::user()->username}}">
                            </div>
                        </div>
                        <div class="row my-4">
                            <label for="foto" class="col-3 col-form-label ml-3">Upload Foto</label>
                            <div class="col-sm-8">
                                <input type="file" id="foto" name="foto" value="{{Auth::user()->foto}}">
                                <p class="help-block help-block-error"></p>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-sm-8">
                                <input type="text" hidden name="id" value="{{Auth::user()->id}}">
                            </div>
                        </div>


                        <div class="row col-sm-8">
                            <div class="form-group col-sm-auto">
                                <button type="submit" class="btn btn-primary">Perbaharui</button>
                            </div>
                            <div class="form-group">
                                <div class="form-group col-sm-auto">
                                    <a href="/admin/eprofil/{{Auth::user()->id}}" class="btn btn-danger">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div id="grid-system2" class="col-sm-3 mt-4">
        <div>
            <div id="grid-system2-body" class="box-body">
                <img src="{{ asset('image')}}/{{Auth::user()->foto}}" class="img-thumbnail" width="250px">
            </div>
        </div>
    </div>

</div>

@endsection
