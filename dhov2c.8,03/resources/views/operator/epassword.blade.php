@extends('layout.header')

<title>Ubah Password</title>

@section('bc')

    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/operator">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/operator/eprofil/{{Auth::user()->id}}">Edit Profil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Password</li>
    </ol>

@endsection

@section('container')

<div class="row">
    <div id="grid-system2" class="col-sm-8">
        <div >
            <div id="grid-system2-body">

                <table id="w0" class="table ">
                    <tbody>
                        <form method="post" action="/operator/eprofil/{{Auth::user()->id}}" class="ml-3">
                            @method('put')
                            @csrf
                            <div class="ml-3">
                                <h4>Ubah Password {{Auth::user()->nama_instansi}}</h4>
                            </div>
                            <div class="row my-4">
                                <label for="password" class="col-3 col-form-label ml-3">Password Baru</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control col-10  @error('password') is-invalid @enderror" id="password" name="password">
                                </div>
                            </div>
                            <div class="row my-4">
                                <label for="konfirmasiPassword" class="col-3 col-form-label ml-3">Konfirmasi Password</label>
                                <div class="col-sm-8">
                                    <input type="Password" class="form-control col-10  @error('konfirmasiPassword') is-invalid @enderror" id="konfirmasiPassword" name="konfirmasiPassword">
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-sm-8">
                                    <input type="text" class="form-control col-10" hidden name="id" value="{{Auth::user()->id}}">
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

</div>

@endsection
