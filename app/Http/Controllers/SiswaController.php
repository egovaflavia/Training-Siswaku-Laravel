<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $halaman = 'siswa';
        $siswa = [
            'Egova', 'Riva', 'Gustino'
        ];
        return view('siswa.index', compact('halaman', 'siswa'));
    }
}
