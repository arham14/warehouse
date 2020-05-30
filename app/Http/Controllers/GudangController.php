<?php

namespace App\Http\Controllers;

use App\Gudang;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        return view('template-parts.gudang.index');
    }

    public function data()
    {
        $gudang = new Gudang;

        return $gudang->where('display', 1)->get();
    }

    public function submit(Request $request)
    {
        $gudang = new Gudang;

        $gudang->kode = $request->kode;

        $gudang->nama_gudang = $request->nama;

        $gudang->status = $request->status;

        $gudang->alamat_gudang = $request->alamat;

        $gudang->display = TRUE;

        $gudang->penanggung_jawab = '-';

        $gudang->save();
    }

    public function update(Request $request)
    {
        $gudang = new Gudang;

        $gudang->where('id', $request->id)->update([
            
            'kode' => $request->kode,

            'nama_gudang' => $request->nama,

            'status' => $request->status,

            'alamat_gudang' => $request->alamat,

        ]);
    }
}
