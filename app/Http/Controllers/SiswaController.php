<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Siswa;
use \App\Kelas;
use App\Telepon;
use Validator;

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
        // Siswa::create($request->all());
        // return redirect('siswa');

        $input = $request->all();

        $validator = Validator::make($input, [
            'nisn' => 'required|string|size:4|unique:siswa,nisn',
            'nama_siswa' => 'required|string|max:30',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_telepon' => 'sometimes|nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon',
            'id_kelas' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('siswa/create')->withInput()->withErrors($validator);
        }

        $siswa = Siswa::create($input);
        $telepon = new Telepon();
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);

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
        $list_kelas = Kelas::pluck('nama_kelas', 'id');
        return view('siswa.create', compact('list_kelas'));
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        if (!empty($siswa->telepon->nomor_telepon)) {
            $siswa->nomor_telepon = $siswa->telepon->nomor_telepon;
        }
        return view('siswa.edit', compact('siswa'));
    }

    public function update($id, Request $request)
    {
        $siswa = Siswa::findOrFail($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'nisn' => 'required|string|size:4|unique:siswa,nisn,' . $request->input('id'),
            'nama_siswa' => 'required|string|max:30',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_telepon' => 'sometimes|nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon,' . $request->input('id') . ',id_siswa',
        ]);

        if ($validator->fails()) {
            return redirect('siswa/' . $id . '/edit')->withInput()->withErrors($validator);
        }

        $siswa->update($request->all());

        if ($siswa->telepon) {
            // Kika telp diisi, update
            if ($request->filled('nomor_telepon')) {
                $telepon = $siswa->telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
            // jika telp tidak di isi, hapus
            else {
                $siswa->telepon()->delete();
            }
        }
        // Nuat entry baru jika sebelumnya tidak ada no telp
        else {
            if ($request->filled('nomor_telepon')) {
                $telepon = new Telepon();
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
        }

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

    // Mutator
    public function dateMutator()
    {
        $siswa = Siswa::findOrFail(15);
        return "Tanggal lahir {$siswa->nama_siswa} adalah {$siswa->tanggal_lahir->format('d-m-Y')}";
    }
}
