@extends('template')

@section('main')
    <div id="siswa" class="mt-3">
        <h2>Detail Siswa</h2>
        {!! link_to('siswa', 'Kembali',['class'=>'btn btn-success btn-sm mb-3 mt-3']) !!}
        <table class="table table-stiped">
            <tr>
                <th>NISN</th>
                <td>{{$siswa->nisn}}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{$siswa->nama_siswa}}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{$siswa->tanggal_lahir}}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{($siswa->jenis_kelamin = 'L') ? 'Laki-Laki' : 'Perempuan'}}</td>
            </tr>
        </table>
    </div>
@endsection