@extends('layout.header')

<title>Profil Operator</title>

@section('bc')

    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/operator">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Profil</li>
    </ol>

@endsection

@section('container')

    <div class="row">
        <div id="grid-system2" class="col-sm-8">
            <div >
                <div id="grid-system2-body">
                    <table id="w0" class="table ">
                        <tbody>
                            <form method="post" class="ml-3">
                                @csrf
                                <div class="ml-3">
                                    <h4>Detail Akun {{Auth::user()->nama_instansi}}</h4>
                                </div>
                                <div class="row my-4">
                                    <label for="nama_instansi" class="col-3 col-form-label ml-3">Nama Instansi</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-10" id="nama_instansi" name="nama_instansi" readonly value="{{Auth::user()->nama_instansi}}">
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="nama_operator" class="col-3 col-form-label ml-3">Nama Operator</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-10" id="nama_operator" name="nama_operator" readonly value="{{Auth::user()->nama_operator}}">
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="username" class="col-3 col-form-label ml-3">Username</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-10" id="username" name="username" readonly value="{{Auth::user()->username}}">
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="password" class="col-3 col-form-label ml-3">Password</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control col-10" id="password" name="password" readonly value="{{Auth::user()->password}}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group ml-4">
                                        <a href="/operator/eprofil/{{Auth::user()->id}}/eprofil2" class="btn btn-success ml-1">Edit Akun</a>
                                    </div>
                                    <div class="form-group ml-2">
                                        <a href="/operator/eprofil/{{Auth::user()->id}}/epassword" class="btn btn-primary ml-0">Ubah Password</a>
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
