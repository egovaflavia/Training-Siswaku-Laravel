<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'tanggal_lahir',
        'jenis_kelamin'
    ];

    // Date Mutator
    protected $dates = ['tanggal_lahir'];

    // Accessor, Merubah lowercase dari database ke view
    public function getNamaSiswaAttribute($nama_siswa)
    {
        return ucwords($nama_siswa);
    }

    // Mutator mengubah data lowercase sblm di simpan di database
    // public function setNamaSiswaAttribute($nama_siswa)
    // {
    //     return strtolower($nama_siswa);
    // }
}
