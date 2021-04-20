<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function jadwal(Request $request){
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
            'ruangan.nama',
            'mata_pelajaran.nama',
            'kelas.tingkatan',
            'kelas.jurusan'
        )
        ->where('users.role','=','guru')
        ->get();
        return view('admin.datajadwal', compact('jadwal'));
    }
    public function destroy($id){
        $jadwal = \DB::table('jadwal')->where('id',$id)->delete();

        return redirect()->back()->with('success', 'Jadwal deleted!');
    }
}