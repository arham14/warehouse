<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Karyawan;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        return view('template-parts.karyawan.index');
    }

    public function data()
    {
        $karyawan = new Karyawan;

        return $karyawan->get();
    }

    public function submit(Request $request)
    {
        return Karyawan::create([
            
            'nip' => $request->nip,

            'nik' => $request->nik,

            'nama_karyawan' => $request->nama,

            'no_hp' => $request->no_hp,

            'alamat' => $request->alamat,

            'status' => "Karyawan Tetap",

            'email' => $request->email

        ]);
    }

    public function update(Request $request)
    {
        $karyawan = new Karyawan;
        
        $karyawan->where('id', $request->id)->update([
            
            'nip' => $request->nip,

            'nik' => $request->nik,

            'nama_karyawan' => $request->nama,

            'no_hp' => $request->no_hp,

            'alamat' => $request->alamat,

            'status' => "Karyawan Tetap",

            'email' => $request->email

        ]);
    }
}
