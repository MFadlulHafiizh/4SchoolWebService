<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sarpras;
use App\Models\Ruangan;
use Alert;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class SaranaPrasaranaController extends Controller
{
    public function getSarprasAjax(Request $request){
        $data = Sarpras::where('id_ruangan', $request->id_ruangan)->first();
        return response(['data', $data]);
    }
    public function index()
    {
        $ruangan= Sarpras::select('*')->paginate(8);
        return view('sarpras.index', compact('ruangan'));
    }

    public function create()
    {   
        $ruangan = Ruangan::all();
        return view('sarpras.form',compact('ruangan'));
    }


    public function store(Request $request){
        $validatedata = $request->validate([
            'nama' => 'required',
            'id_ruangan' => 'required',
            'kondisi' => 'required',
            'jumlah' => 'required'
        ],[
            'id_ruangan.required' => "Pilih ruangan terlebih dahulu",
            'nama.required' => "Masukan nama item terlebih dahulu!",
            'kondisi.required' => "Pilih kondisi ruangan",
            'jumlah.required' => "Masukan jumlah item"
        ]);

        unset($request->_token);

        $create = Sarpras::create($request->all());
        if($create){
            FacadesAlert::success('Success', 'Data berhasil ditambahkan');
            return redirect('/sarpras')->with("success", "Data berhasil dtambahkan");
        }
        else{
            FacadesAlert::error('Error', 'Data gagal ditambahkan');
            return redirect('/sarpras/create')->with("error", "Data gagal dtambahkan");
        }
    }

    public function edit(Request $request, $id){
        //dd($id);
        $ruangan = Ruangan::get();
        $sarpras = Sarpras::find($id);

      
        return view('sarpras.form', compact('ruangan','sarpras'));
    }
    public function update(Request $request, $id){
        $request-> validate([
            'nama'  => 'required'
        ],[
            'nama.required'        => 'Nama tidak boleh kosong'
        ]);

        $input = $request-> all();
        unset($input['_token']);
        unset($input['_method']);

        $update = Sarpras::where('id', $id)-> update($input);
        if($update){
            Alert::success('Success', 'Data berhasil diperbarui');
            return redirect('/sarpras');
        }
        else{
            Alert::error('Error', 'Data gagal diperbarui');
            return redirect()->back();
        }
    }

    public function destroy($id){
        $delete = Sarpras::where('id',$id)->delete();
        if($delete){
            return redirect('/sarpras')->with('success','Data berhasil dihapus');
        }
        else{
            return redirect()->back()->with('error','Data gagal dihapus');
        }
    }

   
}
