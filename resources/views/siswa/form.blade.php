@if (isset($siswa))
    {!! Form::hidden('id', $siswa->id) !!}
@endif
@if ($errors->any)
    <div class="form-group {{ $errors->has('nisn') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nisn', 'NISN', ['class' => 'control-label']) !!}
    {!! Form::text('nisn', null, ['class'=>'form-control','id'=>'nisn']) !!}
    @if ($errors->has('nisn'))
        <span class="help-block">{{ $errors->first('nisn') }}</span>
    @endif
</div>

@if ($errors->any)
    <div class="form-group {{ $errors->has('nama_siswa') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nama_siswa', 'Nama Siswa', ['class' => 'control-label']) !!}
    {!! Form::text('nama_siswa', null, ['class'=>'form-control','id'=>'nama_siswa']) !!}
    @if ($errors->has('nama_siswa'))
        <span class="help-block">{{ $errors->first('nama_siswa') }}</span>
    @endif
</div>

@if ($errors->any)
    <div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('tanggal_lahir', 'Tgl Lahir', ['class' => 'control-label']) !!}
    {!! Form::date('tanggal_lahir', !empty($siswa) ? $siswa->tanggal_lahir->format('Y-m-d') : null, ['class'=>'form-control','id'=>'tanggal_lahir']) !!}
    @if ($errors->has('tanggal_lahir'))
        <span class="help-block">{{ $errors->first('tanggal_lahir') }}</span>
    @endif
</div>

@if ($errors->any)
    <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
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
    @if ($errors->has('jenis_kelamin'))
        <span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
    @endif
</div>

@if ($errors->any)
    <div class="form-group {{ $errors->has('nomor_telepon') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nomor_telepon', 'Telepon', ['class' => 'control-label']) !!}
    {!! Form::text('nomor_telepon', null, ['class'=>'form-control','id'=>'nomor_telepon']) !!}
    @if ($errors->has('nomor_telepon'))
        <span class="help-block">{{ $errors->first('nomor_telepon') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>
