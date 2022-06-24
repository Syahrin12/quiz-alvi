<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact(['pelanggan']));
    }

    public function store(Request $request){ // tambah
        Pelanggan::create([
            'pel_no'        => $request->pel_no,
            'pel_nama'      => $request->pel_nama,
            'pel_alamat'    => $request->pel_alamat,
            'pel_hp'        => $request->pel_hp
        ]);

        return redirect('/pelanggan');
    }

    public function update($id, Request $request){
        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->update([
            'pel_no'        => $request->pel_no,
            'pel_nama'      => $request->pel_nama,
            'pel_alamat'    => $request->pel_alamat,
            'pel_hp'        => $request->pel_hp
        ]);

        return redirect('/pelanggan');
    }

    public function destroy($id)  
    {  
        $pelanggan = Pelanggan::find($id);  
        $pelanggan->delete(); 

        return redirect('/pelanggan');
    }  

    public function search(){
        $search = $request->search;

        $pelanggan = Pelanggan::where('pel_no', 'like', '%' . $search . '%')->paginate();

        return view('pelanggan.index', compact(['pelanggan']));
    }
}