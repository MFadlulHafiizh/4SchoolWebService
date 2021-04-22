<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(Request $request){
        $jadwal = \DB::table('jadwal')
        ->join('users','users.id','=','jadwal.id_user')
        ->join('hari','hari.id','=','jadwal.id_hari')
        ->join('ruangan','ruangan.id','=','jadwal.id_ruangan')
        ->join('mata_pelajaran','mata_pelajaran.id','=','jadwal.id_matpel')
        ->join('kelas','kelas.id','=','jadwal.id_kelas')
        ->select(
            'jadwal.id',
            'users.name',
            'hari.hari',
            'jadwal.jam_mulai',
            'jadwal.jam_selesai',
            'ruangan.nama AS ruangan',
            'mata_pelajaran.nama AS matpel',
            'kelas.tingkatan',
            'kelas.jurusan',
            'kelas.urutan'
        )
        ->where('users.role','=','guru')
        ->get();
        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $dataguru = \DB::table('users')->where('role', 'guru')->get();
        
        $datamatpel = \DB::table('mata_pelajaran')->get();

        $hari = \DB::table('hari')->get();

        $dataruangan = \DB::table('ruangan')->get();

        $datakelas = \DB::table('kelas')->get();

        return view('jadwal.form', compact('dataguru','datamatpel', 'hari', 'dataruangan', 'datakelas'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        $status = \DB::table('jadwal')->insert($input);

        return redirect()->back()->with('success', 'Jadwal berhasil ditambah');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id){
        $jadwal = \DB::table('jadwal')->where('id',$id)->delete();

        return redirect()->back()->with('success', 'Jadwal deleted!');
    }
}