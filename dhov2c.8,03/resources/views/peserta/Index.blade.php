@extends('layout.main')

<title>Code Rapat</title>

    <div class="container box" style="width: 350px; height: 450px;">
        <img src="{{ asset('image/logo.jpg') }}" class="logo_lgn" width="90px" >
        <br>
        <h2 align="center">e-Absent</h2>
        <hr>

        <form method="get" action="/peserta/form" class="mt-3">
            <div class="form-group">
                <label>Masukkan Kode Rapat</label>
                <input type="text" name="kodeRapat" class="form-control" />
            </div>

            <div class="row mx-auto d-flex">
                <div class="form-group">
                    <button type="submit" class="btn btn-success my-2 my-sm-0">Absen</button>
                </div>
            </div>

        </form>

        <hr>
        <div class="form-group ctr_txt">
            <button type="button" class="btn btn-info my-2 my-sm-0 ctr_txt"><a href="/login" class="text-white">Login</a></button>
        </div>
    </div>
