@extends('layout.header')

<title>Riwayat Rapat</title>

@section('bca')

    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">List OPD</li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/opr/drrapat/{{$meeting->id_rapat}}">Riwayat Rapat</a></li>
        <li class="breadcrumb-item active" aria-current="page">Download Notulen Rapat</li>
    </ol>

@endsection

@section('bc')

    <ol class="breadcrumb" style="border:none">
        <li class="breadcrumb-item left_space"><a href="/operator">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/operator/drrapat/{{Auth::user()->id}}">Riwayat Rapat</a></li>
        <li class="breadcrumb-item active" aria-current="page">Download Notulen Rapat</li>
    </ol>

@endsection

@section('container')

    @foreach ($notulen as $notul)
        @if ($notul->id_rapat == $meeting->id_rapat)
            @if (Auth::user()->username == 'operator')
                <form action="/operator/drrapat/{{ $notul->id_notulen }}/download" method="get" enctype="multipart/form-data">
            @else
                <form action="/admin/opr/drrapat/{{ $notul->id_notulen }}/download" method="get" enctype="multipart/form-data">
            @endif
                @csrf
                    <table id="w0" class="table table-borderless">
                        <tbody>
                            <tr>
                                <th style="width: 44px;height: 38px;">

                                    <label for="file_input" style="cursor: pointer; color: Dodgerblue;" class="fas fa-file-download fa-2x" width="100px"></label>
                                    <input type="submit" name="notulen" id="file_input" />

                                </th><td><input type="file" name="notul" value="{{ $notul->notulen }}" hidden><p>{{ $notul->notulen }}</p></td></tr>
                        </tbody>
                    </table>
                </form>
        @endif
    @endforeach


    <script>
        $('#file_input').change(function() {
            $('#selected_filename').text($('#file_input')[0].files[0].name);
        });
    </script>

@endsection
