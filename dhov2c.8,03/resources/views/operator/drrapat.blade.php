@extends('layout.header')

<title>Riwayat Rapat</title>

@section('bca')

    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">List OPD</li>
        <li class="breadcrumb-item active" aria-current="page">Riwayat Rapat</li>
    </ol>

@endsection

@section('bc')

    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/operator">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Riwayat Rapat</li>
    </ol>

@endsection

@section('container')

    <div class="page-header">
        <h3 class="left_space">Riwayat Rapat</h3><hr>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ $meeting->id_rapat }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div>
            <div id="grid-system2" class="col-sm-12">
                <div >
                    <div id="grid-system2-body">

                        <table id="w0" class="table table-borderless">
                            <tbody>
                                <tr><th style="width: 200px;padding-left: 0px;">Nama Kegiatan       </th><td>:</td><td><input type="text" class="form-control col-10" style="right: 480px;" readonly value="{{ $meeting->nama_kegiatan }}"></td></tr>
                                <tr><th style="width: 200px;padding-left: 0px;">Tanggal             </th><td>:</td><td><input type="text" class="form-control col-10" style="right: 480px;" readonly value="{{ $meeting->tanggal }}"></td></tr>
                                <tr><th style="width: 200px;padding-left: 0px;">Pukul               </th><td>:</td><td><input type="text" class="form-control col-10" style="right: 480px;" readonly value="{{ $meeting->waktu }}"></td></tr>
                                <tr><th style="width: 200px;padding-left: 0px;">Tempat              </th><td>:</td><td><input type="text" class="form-control col-10" style="right: 480px;" readonly value="{{ $meeting->tempat }}"></td></tr>
                                <tr><th style="width: 200px;padding-left: 0px;">Pimpinan Rapat      </th><td>:</td><td><input type="text" class="form-control col-10" style="right: 480px;" readonly value="{{ $meeting->pimpinan_rapat }}"></td></tr>
                                <tr><th style="width: 200px;padding-left: 0px;">Notulis Rapat       </th><td>:</td><td><input type="text" class="form-control col-10" style="right: 480px;" readonly value="{{ $meeting->notulis }}"></td></tr>
                                <tr><th style="width: 200px;padding-left: 0px;">Kesimpulan          </th><td>:</td><td><input type="text" class="form-control col-10" style="right: 480px;" readonly value="{{ $meeting->kesimpulan }}"></td></tr>
                                <tr><th style="width: 200px;padding-left: 0px;">Kode Rapat          </th><td>:</td><td><input type="text" class="form-control col-10" style="right: 480px;" readonly value="{{ $meeting->kode_rapat }}"></td></tr>

                                @foreach ($notulen as $notul)

                                @endforeach

                                @if ($notul->id_rapat == 'null' && $meeting->status == 'Selesai')

                                <tr><th style="width: 200px;padding-left: 0px;"><label for="notulen">Upload Notulen Rapat</label></th><td><input type="file" id="notulen" name="notulen"></td></tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="form-group col-sm-8">
            <button type="submit" class="btn btn-info">Upload Notulen</button>
        </div>
    </form>

                                @else

                                <tr><th style="width: 200px;padding-left: 0px;">Notulen Rapat       </th><td>:</td><td>
                                                                    @foreach ($notulen as $notul)
                                                                        @if ($notul->id_rapat == $meeting->id_rapat)
                                                                        <input type="text" class="form-control col-10 mb-1" style="right: 480px;" readonly value="{{ $notul->notulen }}">
                                                                            {{-- <form action="{{ $notul->id_notulen }}/notulen" method="POST">
                                                                                @method('delete')
                                                                                @csrf
                                                                                <table>
                                                                                    <tr>
                                                                                        <td><button type="submit" class="btn fas fa-window-close fa-lg" style="color: red;"></button></td>
                                                                                        <td><p>{{ $notul->notulen }}</p></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </form> --}}
                                                                        @endif
                                                                    @endforeach
                                                                 </td></tr>
                                <tr><th style="width: 200px;padding-left: 0px;">                    </th><td>
                                                                    <label for="file_input" style="cursor: pointer;" class="far fa-plus-square fa-2x" width="100px"></label>
                                                                    <input type="file" name="notulen" id="file_input" />
                                                                    <span id="selected_filename">Tambah Notulen Rapat</span>
                                                                 </td></tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="form-group col-sm-8">
            <button type="submit" class="btn btn-secondary">Upload Notulen</button>
        </div>
    </form>


                                @endif

    <div class="row col-sm-8">

        <div class="form-group">
            <button class="btn btn-success my-2 my-sm-0 ml-3"><a href="{{ $meeting->id_rapat }}/notulen" class="text-white">Download Notulen Rapat</a></button>
        </div>
        <div class="form-group">
            <button class="btn btn-success my-2 my-sm-0 ml-3"><a href="{{ $meeting->id_rapat }}/cetak" class="text-white">Download Absensi dan Foto</a></button>
        </div>
    </div>

    <div>
        <h4 class="left_space">Daftar Foto</h4><hr>
    </div>
    <div class="row col-sm-12  ml-2 mt-1">
        @foreach($photo as $foto)
            {{-- @if($foto->id_rapat == $meeting->id_rapat) --}}
                <div id="grid-system2-body" class="box-body">
                    <img src="{{ asset('image')}}/{{$foto->foto }}" width="250" alt="foto" class="rounded mr-3 mt-3 box">
                </div>
            {{-- @endif --}}
        @endforeach
    </div>
    <hr>

    <br>

    <div>
        <h4 class="left_space">Daftar Peserta</h4><hr>
    </div>

    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Instansi</th>
                    <th scope="col">Jabatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($audiences as $audience)
                    @if ($audience->id_rapat == $meeting->id_rapat)
                        {{-- @if($audience->created_at > $meeting->started_at && $audience->created_at < $meeting->ended_at) --}}
                        <tr>
                            <td>{{ $audience->nip }}</td>
                            <td>{{ $audience->nama }}</td>
                            <td>{{ $audience->instansi }}</td>
                            <td>{{ $audience->jabatan }}</td>
                        </tr>
                        {{-- @endif --}}
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <form>
        <input id="fileinput" type="file" style="display:none;"/>
    </form>
    <button id="falseinput">El Cucaratcha, for example</button>
    <span id="selected_filename">No file selected</span>

    <script>
    $(document).ready( function() {
        $('#falseinput').click(function(){
            $("#fileinput").click();
        });
    });
    $('#fileinput').change(function() {
        $('#selected_filename').text($('#fileinput')[0].files[0].name);
    });
    </script> --}}

    {{-- untuk tambah notulen --}}
        <script>
        $('#file_input').change(function() {
            $('#selected_filename').text($('#file_input')[0].files[0].name);
        });
        </script>
    {{-- tambah notulen --}}

@endsection
