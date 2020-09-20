<div class="form-group">
    {!! Form::label('nisn', 'NISN', ['class' => 'control-label']) !!}
    {!! Form::text('nisn', null, ['class'=>'form-control','id'=>'nisn']) !!}
</div>
<div class="form-group">
    {!! Form::label('nama_siswa', 'Nama Siswa', ['class' => 'control-label']) !!}
    {!! Form::text('nama_siswa', null, ['class'=>'form-control','id'=>'nama_siswa']) !!}
</div>
<div class="form-group">
    {!! Form::label('tanggal_lahir', 'Tgl Lahir', ['class' => 'control-label']) !!}
    {!! Form::date('tanggal_lahir', null, ['class'=>'form-control','id'=>'tanggal_lahir']) !!}
</div>
<div class="form-group">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin', ['class'=>'control-label']) !!}
    <br>
    <div class="form-check form-check-inline">
        {!! Form::radio('jenis_kelamin', 'L', ['class'=>'form-check-input']) !!}
        {!! Form::label('jenis_kelamin', 'Laki-Laki', ['class'=>'form-check-label']) !!}
    </div>
    <div class="form-check form-check-inline">
        {!! Form::radio('jenis_kelamin', 'P', ['class'=>'form-check-input']) !!}
        {!! Form::label('jenis_kelamin', 'Perempuan', ['class'=>'form-check-label']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>
