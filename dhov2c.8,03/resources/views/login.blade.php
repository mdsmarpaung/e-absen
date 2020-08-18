@extends('layout.main')

<title>Login Page</title>

<div class="container box">
    <img src="image/logo.jpg" class="logo_lgn card-image-top" width="90px" >
    <h3 align="center">e-Absent</h3>
    <br/>
    <hr>

    <form method="post" action="/kirimdata" class="">
        {{csrf_field()}}
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" />
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" />
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group btn_submit">
            <button class="btn btn-info my-2 my-sm-0">Masuk</button>
        </div>

        <hr>

        <div class="form-group ctr_txt">
            <a class="badge badge-success btn_absen font-weight-light" href="/">Absensi Rapat</a>
        </div>

    </form>
</div>




