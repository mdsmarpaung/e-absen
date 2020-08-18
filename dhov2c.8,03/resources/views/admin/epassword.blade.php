@extends('layout.header')

<title>Ubah Password</title>

@section('container')

<div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item left_space"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item left_space"><a href="/admin/eprofil/{{$operator->id}}">Detail Akun</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
    </ol>
    <div class="row">
        <div id="grid-system2" class="col-sm-8">
            <div >
                <div id="grid-system2-body">

                    <table id="w0" class="table ">
                        <tbody>
                            <form method="post" action="/admin/eprofil/{{ $operator->id }}" class="ml-3">
                                @method('put')
                                @csrf
                                <div class="ml-3">
                                    <h4>Ubah Password {{ $operator->nama_instansi }}</h4>
                                </div>
                                <div class="row my-4">
                                    <label for="password" class="col-3 col-form-label ml-3">Password Baru</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control col-10  @error('password') is-invalid @enderror" id="password" name="password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <label for="konfirmasiPassword" class="col-3 col-form-label ml-3">Konfirmasi Password</label>
                                    <div class="col-sm-8">
                                        <input type="Password" class="form-control col-10  @error('konfirmasiPassword') is-invalid @enderror" id="konfirmasiPassword" name="konfirmasiPassword">
                                        @error('konfirmasiPassword')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
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
    </div>
</div>

@endsection

@section('footer')
@endsection
