<!DOCTYPE html>
<html>
    <head>
        <?php
            ini_set('max_execution_time', '0')
        ?>
        <title>Cetak Absensi dan Foto</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>


    <body>
        <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
        </style>
        <center>
        <img src="image/logo.jpg" class="center" style="width:100px; height:100px"alt="logo">
        </center>

        <center>
            <h2>Laporan Riwayat Rapat</h2>
        </center>
        <br>

        <div>
            <h4 class="left_space">Rincian Rapat</h4><hr>
        </div>

        <table id="w0" class="table table-hover" style="border: 1px solid #c0c0c0">
            <tbody>
                <tr><th style="width: 180px;">Nama Kegiatan       </th><td><p class="text-black-50">{{ $meeting->nama_kegiatan }}</p></td></tr>
                <tr><th>Tanggal             </th><td><p class="text-black-50">{{ $meeting->tanggal }}</p></td></tr>
                <tr><th>Pukul               </th><td><p class="text-black-50">{{ $meeting->waktu }}</p></td></tr>
                <tr><th>Tempat              </th><td><p class="text-black-50">{{ $meeting->tempat }}</p></td></tr>
                <tr><th>Pimpinan Rapat      </th><td><p class="text-black-50">{{ $meeting->pimpinan_rapat }}</p></td></tr>
                <tr><th>Notulis Rapat       </th><td><p class="text-black-50">{{ $meeting->notulis }}</p></td></tr>
                <tr><th>Kesimpulan          </th><td><p class="text-black-50">{{ $meeting->kesimpulan }}</p></td></tr>
                <tr><th>Kode Rapat          </th><td><p class="text-black-50">{{ $meeting->kode_rapat }}</p></td></tr>

                {{-- @foreach ($notulen as $notul)
                    @if ($notul->id_rapat == $meeting->id_rapat)
                        <p>{{ $notul->notulen }}</p>
                    @endif
                @endforeach --}}

            </tbody>
        </table>

        <div>
            <h4 class="left_space">Daftar Foto Rapat</h4><hr>
        </div>

        <div class="row col-sm-12  ml-2 mt-1">
            @foreach($photo as $foto)
                @if($foto->id_rapat == $meeting->id_rapat)
                <?php
                $nama_foto = $foto->get('foto');
                ?>

                {{-- <img src="{{ asset('image')}}/{{ $nama_foto }}" width="150" alt="foto" class="rounded mr-3 mt-3 box img-load"> --}}
                    {{-- kalau gini bisa dia -> <img src="image/1596678192.Naruto Summoning.jpeg" width="200" alt="foto" class="rounded mr-3 mt-3 box"> --}}
                @endif
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
                            <tr>
                                <td>{{ $audience->nip }}</td>
                                <td>{{ $audience->nama }}</td>
                                <td>{{ $audience->instansi }}</td>
                                <td>{{ $audience->jabatan }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

    </body>
</html>
