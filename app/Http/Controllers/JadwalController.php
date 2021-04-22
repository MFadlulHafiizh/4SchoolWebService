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
        $data['guru'] = \DB::table('users')->where('role', 'guru')->get();
        $data['matpel'] = \DB::table('mata_pelajaran')->get();
        $data['hari'] = \DB::table('hari')->get();
        $data['ruangan'] = \DB::table('ruangan')->get();
        $data['kelas'] = \DB::table('kelas')->get();

        return view('jadwal.form', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        $status = \DB::table('jadwal')->insert($input);

        if($status) {
            return redirect('/jadwal')->with('success', 'Jadwal berhasil ditambah');
        } else {
            return redirect()->back()->with('error','Jadwal gagal ditambah');
        }
    }

    public function edit($id)
    {
        $data['guru'] = \DB::table('users')->where('role', 'guru')->get();
        $data['matpel'] = \DB::table('mata_pelajaran')->get();
        $data['hari'] = \DB::table('hari')->get();
        $data['ruangan'] = \DB::table('ruangan')->get();
        $data['kelas'] = \DB::table('kelas')->get();
        $data['jadwal'] = \DB::table('jadwal')->find($id);

        return view('jadwal.form', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        unset($input['_token'], $input['_method']);
        $status = \DB::table('jadwal')->where('id', $id)->update($input);

        if ($status) {
            return redirect('/jadwal')->with('success', 'Tambah Jadwal Sukses');
        } else {
            return redirect()->back()->with('error', 'Tambah Jadwal Gagal');
        }
    }

    public function destroy($id){
        $jadwal = \DB::table('jadwal')->where('id',$id)->delete();

        return redirect()->back()->with('success', 'Jadwal Dihapus');
    }
}