@extends('template')

@section('main')
    <div id="siswa" class="mt-3">
        <h2>Siswa</h2>
        <hr>
        <?php
        if (!empty($siswas)) : ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Np</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tgl Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telepon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($siswas as $no => $row) : ?>
                <tr>
                    <td>{{++$no}}</td>
                    <td>{{$row->nisn }}</td>
                    <td>{{$row->nama_siswa }}</td>
                    <td>{{$row->kelas->nama_kelas }}</td>
                    <td>{{$row->tanggal_lahir->format('d-m-Y')}}</td>
                    <td>{{($row->jenis_kelamin == 'L') ? 'Laki-Laki' : 'Perempuan'}}</td>
                    <td>{{ !empty($row->telepon->nomor_telepon) ? $row->telepon->nomor_telepon : '-' }}</td>
                    <td>
                        <div class="box-button">
                            {{ link_to('siswa/'.$row->id, 'Detail',['class'=>'btn btn-success btn-sm']) }}
                        </div>
                        <div class="box-button">
                            {!! link_to('siswa/'.$row->id.'/edit', 'Edit', ['class'=>'btn btn-warning btn-sm']) !!}
                        </div>
                        <div class="box-button">
                            {!! Form::open(['method'=>'DELETE','action'=> ['SiswaController@destroy', $row->id]]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php else : ?>
            <p>
                Tidak ada data
            </p>
        <?php endif ?>
        <div class="table-bottom">
            <div class="pull-left">
                <strong>Jumlah Siswa : {{$jumlah_siswa}}</strong>
            </div>
            <br>
            <br>
            <div class="pull-right">
                {{ $siswas->links() }}
            </div>

            <div class="bottom-nav">
                <div>
                    {!! link_to('siswa/create', 'Tambah Data', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

        </div>
    </div>
@endsection
