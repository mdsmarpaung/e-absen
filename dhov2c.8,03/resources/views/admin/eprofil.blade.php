@extends('layout.header')

<title>Profil Operator</title>

@section('bca')

    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Akun</li>
    </ol>

@endsection

@section('container')
    <div>
        <div class="row">
            <div id="grid-system2" class="col-sm-8">
                <div >
                    <div id="grid-system2-body">
                        <table id="w0" class="table ">
                            <tbody>
                                <form method="post" class="ml-3">
                                    @csrf
                                    <div class="ml-3">
                                        <h4>Detail Akun {{ $operator->nama_instansi }}</h4>
                                    </div>
                                    <div class="row my-4">
                                        <label for="nama_instansi" class="col-3 col-form-label ml-3">Nama Instansi</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control col-10" id="nama_instansi" name="nama_instansi" readonly value="{{ $operator->nama_instansi }}">
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <label for="nama_operator" class="col-3 col-form-label ml-3">Nama Operator</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control col-10" id="nama_operator" name="nama_operator" readonly value="{{ $operator->nama_operator }}">
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <label for="username" class="col-3 col-form-label ml-3">Username</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control col-10" id="username" name="username" readonly value="{{ $operator->username }}">
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <label for="password" class="col-3 col-form-label ml-3">Password</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control col-10" id="password" name="password" readonly value="{{ $operator->password }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group ml-4">
                                            <a href="/admin/eprofil/{{ $operator->id }}/eprofil2" class="btn btn-success ml-1">Edit Akun</a>
                                        </div>
                                        <div class="form-group ml-2">
                                            <a href="/admin/eprofil/{{ $operator->id }}/epassword" class="btn btn-primary ml-0">Ubah Password</a>
                                        </div>
                                        <div class="form-group ml-2">
                                            <!-- Tombol modal -->
                                            <button type="button" class="btn btn-danger mr-10" data-toggle="modal" data-target="#modalSaya">
                                                Hapus Akun
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modalSaya" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalSayaLabel">Hapus Akun</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus akun {{$operator->nama_instansi}}?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <form action="/admin/eprofil/{{ $operator->id }}" method="post" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary">Ya</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
                        <img src="{{ asset('image')}}/{{ $operator->foto }}" width="250" alt="foto" class="rounded">
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('footer')
@endsection
