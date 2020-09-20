<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Siswa;

class SiswaController extends Controller
{
    protected $request;

    public function store(Request $request)
    {
        // Cara Lama
        // $siswa = new Siswa;
        // $siswa->nisn = $request->nisn;
        // $siswa->nama_siswa = $request->nama_siswa;
        // $siswa->tanggal_lahir = $request->tgl_lahir;
        // $siswa->jenis_kelamin = $request->jenis_kelamin;
        // $siswa->save();

        // Cara singkat
        Siswa::create($request->all());
        return redirect('siswa');
    }

    public function index()
    {
        $siswas = Siswa::orderBy('nama_siswa', 'asc')->Paginate(5);
        $jumlah_siswa = Siswa::count();
        return view('siswa.index', compact('siswas', 'jumlah_siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update($id, Request $request)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
        return redirect('siswa');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect('siswa');
    }

    // Eloquent: Collection
    public function tesCollection()
    {
        $orang = ['rasmus lerdorf', 'taylor otwel', 'brenden eich'];
        $collection = collect($orang)->map(function ($nama) {
            return ucwords($nama);
        });
        return $collection;
    }

}
