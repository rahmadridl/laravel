<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerja;
use App\Models\Lamar;

class KerjaController extends Controller
{
    public function index()
    {
        return view('kerja')->with('kerja', Kerja::all());
    }
    public function index2()
    {
        return view('lamar')->with('lamar', Lamar::all());
    }
    public function daftar()
    {
        return view('daftar');
    }
    public function store(Kerja $id)
    {
        $kerja = Kerja::find($id);
        request()->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'nullable',
            'cv' => 'nullable',
            'kerja_id' => 'required'
        ]);

        Lamar::create([
            'nama' => request('nama'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'cv' => request('cv'),
            'kerja_id' => $id
        ]);
        $kerja->lamars()->save($lamar);
        return redirect('/kerja');
    }
    public function addKerja()
    {
        $kerja = new Kerja();
        $kerja->nama = "mencuci";
        $kerja->save();
        return "pekerjaan berhasil dibuat";
    }

    public function addLamar($id)
    {
        $kerja = Kerja::find($id);
        $lamar = new Lamar();
        $lamar-> nama -> request('nama');
        $kerja->lamars()->save($lamar);
        return "berhasil melamar";
    }
    public function getLamarsByKerja($id)
    {
        $lamars = Kerja::find($id)->lamars;
        return $lamars;
    }
}
