<?php
namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index()
    {   
        $golongan = Golongan::all();
        return view('golongan.index', compact(['golongan']));
        
    }
     
    public function store(Request $request){ // tambah
        $request->validate(
            [
                'gol_kode' => "required",
                'gol_nama' => "required"
            ],
            [
                'gol_kode.required' => "Kode golongan wajib diisi",
                'gol_nama.required' => "Nama golongan wajib diisi"
            ]
        );
        // Golongan::create($request->except("_token", "submit"));
        Golongan::create([
            'gol_kode'      => $request->gol_kode,
            'gol_nama'      => $request->gol_nama,
            'created_at'    => $request->created_at,
            'updated_at'    => $request->updated_at
        ]);
        return redirect('/golongan');
    }

    public function update($id, Request $request){
        $request->validate(
            [
                'gol_kode' => "required",
                'gol_nama' => "required"
            ],
            [
                'gol_kode.required' => "Kode golongan wajib diisi",
                'gol_nama.required' => "Nama golongan wajib diisi"
            ]
        );

        $golongan = Golongan::findOrFail($id);
        $golongan->update([
            'gol_kode'      => $request->gol_kode,
            'gol_nama'      => $request->gol_nama,
            'created_at'    => $request->created_at,
            'updated_at'    => $request->updated_at,
        ]);

        return redirect('/golongan');
    }

    public function destroy($id)  
    {  
        $golongan = Golongan::find($id);  
        $golongan->delete(); 

        return redirect('/golongan');
    }  

    public function search(Request $request){
        $search = $request->search;

        $golongan = Golongan::where('gol_kode', 'like', '%' . $search . '%')->paginate();

        return view('golongan.index', compact(['golongan']));
    }
}