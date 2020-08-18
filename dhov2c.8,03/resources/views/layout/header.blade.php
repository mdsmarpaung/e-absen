@extends('layout.main')

@section('header')

    <div class="mx-5 border">
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="mr-auto">
                    <div class="row">
                        <img src="{{ asset('image/logo.jpeg') }}" class="logo_hdr ml-2" width="70px" >
                        <h2 class="ml-3 mt-3 font-weight-light">e-Absent</h2>
                    </div>
                </div>

                @if (Auth::user()->username == 'admin')

                <img src="{{ asset('image/adm.png') }}" class="logo_hdr ml-2" width="40px" >

                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                    </button>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div><a class="btn btn-link" href="/keluar">Keluar</a></div>
                    </div>
                </div>
            </nav>

            @yield('bca')

                @else

                <img src="{{ asset('image')}}/{{Auth::user()->foto}}" class="logo_hdr ml-2" width="50px" >

                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->nama_instansi}}
                    </button>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div><a class="btn btn-link" href="/operator/eprofil/{{Auth::user()->id}}">Edit Profil</a></div>
                        <div><a class="btn btn-link" href="/keluar">Keluar</a></div>
                    </div>
                </div>
            </nav>

            @yield('bc')

                @endif

            @yield('container')

            <footer class="main-footer box_footer" align="center">
                <strong>
                    <h6>e-Absent</h6>
                    <h6>Mahasiswa Kerja Praktik IT DEL © 2020</h6>
                    <h6>Dinas Komunikasi dan Informatika Kabupaten Humbang Hasundutan</h6>
                </strong>
            </footer>

        </div>
    </div>

@endsection


