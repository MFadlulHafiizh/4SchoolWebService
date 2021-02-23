<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Sarpras;
use Alert;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class RuanganController extends Controller
{
    function getRuanganAjax(Request $request)
    {
        $getData = Ruangan::select('*');
        if ($request->lantai != "") {
            $getData = $getData->where('lantai', $request->lantai);
        }
        if ($request->blok != "") {
            $getData = $getData->where('blok', $request->blok);
        }
        if ($request->tipe != "") {
            $getData = $getData->where('tipe', $request->tipe);
        }
        if ($request->status != "") {
            $getData = $getData->where('status', $request->status);
        }

        $getData = $getData->get();

        return response(['dataRuang' => $getData]);
    }

    function getSarprasAjax(Request $request)
    {
        $getData = Sarpras::where('id_ruangan', $request->id_ruangan)->get();
        return response(['dataSarpras' => $getData]);
    }

    public function index()
    {
        $dataRuangan = Ruangan::select('*')->paginate(8);

        return view('ruangan.index', compact('dataRuangan'));

     
    }

    public function create()
    {
        return view('ruangan.form');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama'      => 'required',
            'tipe'      => 'required|string',
            'lantai'    => 'required|numeric',
            'blok'      => 'required|string',
            'status'    => 'required',
            'deskripsi' => 'required|string'
        ], [
            'nama.required'     => 'Nama ruangan tidak boleh kosong',
            'tipe.required'     => 'Pilih tipe terlebih dahulu',
            'lantai.required'   => 'Pilih lantai terlebih dahulu',
            'blok.required'     => 'Pilih blok terlebih dahulu',
            'status.required'   => 'Pilih status terlebih dahulu'
        ]);

        $input = Ruangan::create($validatedData);

        if($input){
            FacadesAlert::success('Success', 'Data berhasil ditambahkan');
            return redirect('/ruangan')->with('success', 'Data berhasil ditambahkan');
        }else{
            FacadesAlert::error('Error', 'Data gagal ditambahkan');
            return redirect('/ruangan/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit(Request $request, $id){
        $dataRuangan = Ruangan::find($id);
        return view('ruangan.form', compact('dataRuangan'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'nama'      => 'required'
        ],[
            'nama.required'     => 'Nama ruangan tidak boleh kosong'
        ]);
        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        $update = Ruangan::where('id',$id)->update($input);
        if($update){
            FacadesAlert::success('Euccess', 'Data berhasil diperbarui');
            return redirect('/ruangan')->with('success', 'Data berhasil diperbarui');
        }
        else{
            FacadesAlert::error('Error', 'Data gagal diperbarui');
            return redirect()->back()->with('error', 'Data gagal diperbarui');
        }
    }
    public function destroy($id){
        $delete = Ruangan::where('id',$id)->delete();
        if($delete){
            return redirect('/ruangan')->with('success','Data berhasil dihapus');
        }
        else{
            return redirect()->back()->with('error','Data gagal dihapus');
        }
    }
}
