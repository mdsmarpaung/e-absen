@extends('layout.header')

<title>OPD {{ $operator->nama_instansi }}</title>

@section('bca')

    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">List OPD</li>
        <li class="breadcrumb-item active" aria-current="page">Detail Kegiatan OPD {{ $operator->nama_instansi }}</li>
    </ol>

@endsection

@section('container')

    <div class="page-header">
        <h3 class="left_space">Rincian Kegiatan {{ $operator->nama_instansi }}</h3><hr>
    </div>

    <div class="">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active mr-auto" id="nav-home-tab" data-toggle="tab" href="#buat_rapat" role="tab" aria-controls="nav-home" aria-selected="true">Buat Rapat</a>
                <a class="nav-item nav-link mr-auto" id="nav-profile-tab" data-toggle="tab" href="#daftar_rapat" role="tab" aria-controls="nav-profile" aria-selected="false">Daftar Rapat (Dibuat)</a>
                <a class="nav-item nav-link mr-auto" id="nav-contact-tab" data-toggle="tab" href="#dokumentasi" role="tab" aria-controls="nav-contact" aria-selected="false">Absensi/Dokumentasi (Berlangsung)</a>
                <a class="nav-item nav-link mr-auto" id="nav-contact-tab" data-toggle="tab" href="#riwayat" role="tab" aria-controls="nav-contact" aria-selected="false">Riwayat Rapat (Selesai/Batal)</a>
            </div>
        </nav>

        <div>
            <div class="tab-content">
                <div class="tab-pane active" id="buat_rapat">

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

                                    <form method="POST" action="/admin/meeting" class="ml-3">
                                        @csrf

                                        {{-- <div class="row mb-3">
                                            <label for="topikRapat">Textarea</label>
                                            <textarea class="form-control" id="topikRapat" rows="3" cols="10"></textarea>
                                        </div> --}}

                                        <div class="row my-4">
                                            <label for="topikRapat" class="col-2 col-form-label">Topik Rapat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control col-8 @error('topikRapat') is-invalid @enderror" id="topikRapat" name="topikRapat" value="{{ old('topikRapat') }}">
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
                                                <input type="date" class="form-control col-3 @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
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
                                                <input type="time" class="form-control col-2 @error('waktu') is-invalid @enderror" id="waktu" name="waktu" value="{{ old('waktu') }}">
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
                                                <input type="text" class="form-control col-8 @error('tempat') is-invalid @enderror" id="tempat" name="tempat" value="{{ old('tempat') }}">
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
                                                <input type="text" class="form-control col-8 @error('pimpinanRapat') is-invalid @enderror" id="pimpinanRapat" name="pimpinanRapat" value="{{ old('pimpinanRapat') }}">
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
                                                <input type="text" class="form-control col-8 @error('notulisRapat') is-invalid @enderror" id="notulisRapat" name="notulisRapat" value="{{ old('notulisRapat') }}">
                                                @error('notulisRapat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row my-4">
                                            <div class="col-sm-10">
                                                <input type="text" hidden class="form-control col-8" name="id_Opd" value={{$operator->id}}>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-auto">
                                                <button type="submit" class="btn btn-success my-2 my-sm-0">Buat Baru</button>
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

                </div>

                <?php
                $user = $operator->id;
                ?>

                <div class="tab-pane fade" id="daftar_rapat">
                    <table class="table table-borderless table-sm">
                        <br>
                        <tbody>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Topik Rapat</th>
                                        <th scope="col ml-1">Tanggal</th>
                                        <th scope="col ml-1">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;?>
                                     @foreach($md as $meet)
                                        @if($meet->id_opt == $user)
                                            <?php $no++ ;?>
                                            <tr>
                                                <th scope="row">{{ $no }}</th>
                                                <td>{{ $meet->nama_kegiatan }}</td>
                                                <td>{{ $meet->tanggal }}</td>
                                                <td>Dibuat</td>
                                                <td><button class="btn btn-info"><a href="/admin/opr/drapat/{{ $meet->id_rapat }}" class="text-white">Detail</a></button></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="dokumentasi">

                    <table class="table table-borderless table-sm">
                        <br>
                        <tbody>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Topik Rapat</th>
                                        <th scope="col ml-1">Tanggal</th>
                                        <th scope="col ml-1">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach($mb as $meet)
                                        @if($meet->id_opt == $user)
                                            <?php $no++ ;?>
                                            <tr>
                                                <th scope="row">{{ $no }}</th>
                                                <td>{{ $meet->nama_kegiatan }}</td>
                                                <td>{{ $meet->tanggal }}</td>
                                                <td>Berlangsung</td>
                                                <td><button class="btn btn-info"><a href="/admin/opr/dbrapat/{{ $meet->id_rapat }}" class="text-white">Detail</a></button></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </tbody>
                    </table>

                </div>

                <div class="tab-pane fade" id="riwayat">

                    <table class="table table-borderless table-sm">
                        <br>
                        <tbody>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Topik Rapat</th>
                                        <th scope="col ml-1">Tanggal</th>
                                        <th scope="col ml-1">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach($ms as $meet)
                                        @if($meet->id_opt == $user)
                                            <?php $no++ ;?>
                                            <tr>
                                                <th scope="row">{{ $no }}</th>
                                                <td>{{ $meet->nama_kegiatan }}</td>
                                                <td>{{ $meet->tanggal }}</td>
                                                <td>Selesai</td>
                                                <td><button class="btn btn-info"><a href="/admin/opr/drrapat/{{ $meet->id_rapat }}" class="text-white">Detail</a></button></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach($mg as $meet)
                                    @if($meet->id_opt == $user)
                                            <?php $no++ ;?>
                                            <tr>
                                                <th scope="row">{{ $no }}</th>
                                                <td>{{ $meet->nama_kegiatan }}</td>
                                                <td>{{ $meet->tanggal }}</td>
                                                <td>Batal</td>
                                                <td><button class="btn btn-info"><a href="/admin/opr/drrapat/{{ $meet->id_rapat }}" class="text-white">Detail</a></button></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- @foreach($ms as $meet)
                                @if($meet->id_opt == $user)
                                    <tr class="ls_bg_color"><td class="pl-3"><div>{{ $meet->nama_kegiatan }} (Selesai)</div><div style="font-size: 12px;">{{ $meet->tanggal }}</div></td><td ><button class="btn btn-info"><a href="/operator/drrapat/{{ $meet->id_rapat }}" class="text-white">Detail</a></button></td></tr>
                                @endif
                            @endforeach
                            @foreach($mg as $meet)
                                @if($meet->id_opt == $user)
                                    <tr class="ls_bg_color"><td class="pl-3"><div>{{ $meet->nama_kegiatan }} (Dibatalkan)</div><div style="font-size: 12px;">{{ $meet->tanggal }}</div></td><td ><button class="btn btn-info"><a href="/operator/drrapat/{{ $meet->id_rapat }}" class="text-white">Detail</a></button></td></tr>
                                @endif
                            @endforeach --}}
                        </tbody>
                    </table>

                </div>
                </div>

            </div>
        </div>
    </div>

@endsection
