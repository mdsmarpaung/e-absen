@extends('layout.header')

<title>Dashboard Admin</title>

@section('bca')

    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>

@endsection

@section('container')

    <div class="">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active mr-auto" id="nav-home-tab" data-toggle="tab" href="#buat_akun" role="tab" aria-controls="nav-home" aria-selected="true">Buat Akun</a>
                <a class="nav-item nav-link mr-auto" id="nav-profile-tab" data-toggle="tab" href="#list_akun" role="tab" aria-controls="nav-profile" aria-selected="false">List Akun</a>
                <a class="nav-item nav-link mr-auto" id="nav-contact-tab" data-toggle="tab" href="#list_opd" role="tab" aria-controls="nav-contact" aria-selected="false">List OPD</a>
            </div>
        </nav>

        <div class="">
            <div class="tab-content">
                <div class="tab-pane active" id="buat_akun">

                    @if (session('status'))
                        <br>
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div id="grid-system2" class="col-sm-12">
                            <div>
                                <div id="grid-system2-body">

                                    <form method="POST" action="/admin" class="ml-3" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row my-4">
                                            <label for="nama_instansi" class="col-2 col-form-label">Nama Instansi</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control col-8 @error('nama_instansi') is-invalid @enderror" id="nama_instansi" name="nama_instansi" value="{{ old('nama_instansi') }}">
                                                @error('nama_instansi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row my-4">
                                            <label for="nama_operator" class="col-2 col-form-label">Nama Operator</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control col-8 @error('nama_operator') is-invalid @enderror" id="nama_operator" name="nama_operator" value="{{ old('nama_operator') }}">
                                                @error('nama_operator')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row my-4">
                                            <label for="username" class="col-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control col-8 @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                                                @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row my-4">
                                            <label for="password" class="col-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control col-8 @error('password') is-invalid @enderror" id="password" name="password">
                                                @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row my-4">
                                            <label for="konfirmasiPassword" class="col-2 col-form-label">Konfirmasi Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control col-8 @error('konfirmasiPassword') is-invalid @enderror" id="konfirmasiPassword" name="konfirmasiPassword">
                                                @error('konfirmasiPassword')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row my-4">
                                            <label for="uploadFoto" class="col-2 col-form-label">Upload Foto</label>
                                            <div class="col-sm-10">
                                                <input type="file" id="uploadFoto" name="foto" value="{{ old('foto') }}">
                                                <p class="help-block help-block-error"></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-auto">
                                                <button type="submit" class="btn btn-success my-2 my-sm-0">Buat Akun</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane tab-pane fade" id="list_akun">
                    <table class="table table-borderless table-sm" border="1" width="600px">
                        <tbody>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Instansi</th>
                                        <th scope="col ml-1">Username</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;?>
                                     @foreach($operators as $operator)
                                     <?php $no++ ;?>
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <td>{{ $operator->nama_instansi }}</td>
                                            <td>{{ $operator->username }}</td>
                                            <td><button class="btn btn-info"><a href="/admin/eprofil/{{ $operator->id }}" class="text-white">Detail</a></button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane tab-pane fade left_space" id="list_opd">

                    <table class="table table-borderless table-sm">
                        <br>
                        <tbody>
                            <ul class="list-unstyled">
                                @foreach($operators as $operator)
                                        <li class="mb-2 ml-3"><a href="/admin/opr/{{ $operator->id }}"><font size="4.99"><u>{{ $operator->nama_instansi }}</u></font></a></li>
                                @endforeach
                            </ul>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
