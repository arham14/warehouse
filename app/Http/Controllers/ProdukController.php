<?php

namespace App\Http\Controllers;

use App\ProdukHeader;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewMaster()
    {
        return view('template-parts.produk.master');
    }

    public function viewPo()
    {
        return view('template-parts.produk.po');
    }

    public function data()
    {
        $p_header = new ProdukHeader;

        $data = $p_header->get();

        return $data;
    }

    public function submitHeader(Request $request)
    {
        $p_header = new ProdukHeader;

        $p_header->kode_produk = $request->kode_produk;

        $p_header->nama_produk = $request->nama_produk;

        $p_header->berat_produk = $request->berat_produk;

        $p_header->save();
    }
}
