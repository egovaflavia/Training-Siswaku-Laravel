@extends('template')

@section('main')
    <div id="siswa" class="mt-3">
        <h2>Detail Siswa</h2>
        {!! link_to('siswa', 'Kembali',['class'=>'btn btn-success btn-sm mb-3 mt-3']) !!}
        <br>
        <br>
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
                <th>Nama Kelas</th>
                <td>{{$siswa->kelas->nama_kelas}}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{$siswa->tanggal_lahir->format('d-m-Y')}}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{($siswa->jenis_kelamin = 'L') ? 'Laki-Laki' : 'Perempuan'}}</td>
            </tr>
            <tr>
                <th>Nomor Telepon</th>
                <td>{{ !empty($siswa->telepon->nomor_telepon) ? $siswa->telepon->nomor_telepon : '-'}}</td>
            </tr>
            <tr>
                <th>Hobi</th>
                <td>
                    @foreach ($siswa->hobi as $item)
                        <span>{{ $item->nama_hobi }}</span>,
                    @endforeach
            </td>
            </tr>
        </table>
    </div>
@endsection
