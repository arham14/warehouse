<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewMaster()
    {
        return view('template-parts.supplier.master');
    }

    public function submit(Request $request)
    {
        $supplier = new Supplier;

        $supplier->nama_supplier = $request->nama_supplier;

        $supplier->tlp_supplier = $request->tlp_supplier;

        $supplier->alamat_supplier = $request->alamat_supplier;

        $supplier->save();
    }

    public function data()
    {
        $supplier = new Supplier;

        $data = $supplier->select('*', 'nama_supplier as text')->get();

        return $data;
    }
}
