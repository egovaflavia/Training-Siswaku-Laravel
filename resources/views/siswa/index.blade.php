@extends('template')

@section('main')
    <div id="siswa" class="mt-3">
        <h2>Siswa</h2>
        <hr>
        <?php
        if (!empty($siswa)) : ?>
            <ul>
                <?php foreach ($siswa as $row) : ?>
                    <li><?= $row ?></li>
                <?php endforeach ?>
            </ul>
        <?php else : ?>
            <p>
                Tidak ada data
            </p>
        <?php endif ?>
    </div>
@endsection
