<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use App\Models\Tugas_kelas;


class SiswaInteractionController extends Controller
{
    // get siswa schedule
    public function SiswaSchedule(Request $request){
        $jadwal = DB::table('jadwal')
        ->join('hari','jadwal.id_hari','=','hari.id')
        ->join('ruangan','jadwal.id_ruangan','=','ruangan.id')
        ->join('mata_pelajaran','jadwal.id_matpel','=','mata_pelajaran.id')
        ->join('kelas','jadwal.id_kelas','=','kelas.id')
        ->select(
            'jadwal.id as id_jadwal',
            'hari.hari',
            'jadwal.jam_mulai',
            'jadwal.jam_selesai',
            'ruangan.nama as ruangan' ,
            'mata_pelajaran.id as id_matpel',
            'mata_pelajaran.nama as mapel',
            'kelas.id as id_kelas'
        )
        ->where('jadwal.id_kelas', '=', "$request->id_kelas")
        ->get();
        if (empty("$request->id_kelas")) {
            return response()->json("Schedule Not Found",404);
        }else {
        return response()->json([
            'jadwal_pelajaran' =>$jadwal
         
        ]);
        }
    }

    public function ClassRoomIndex(Request $request, $id_jadwal){
        $classroomData = Tugas_kelas::join('jadwal', 'tugas_kelas.id_jadwal', '=', 'jadwal.id')
        ->join('kelas', 'jadwal.id_kelas', '=', 'kelas.id')
        ->join('mata_pelajaran', 'jadwal.id_matpel', '=', 'mata_pelajaran.id')
        ->leftJoin('file_tugas_siswa', 'tugas_kelas.id', '=', 'file_tugas_siswa.id_tugas_kelas')
        ->where('tugas_kelas.id_jadwal', $id_jadwal)
        ->select(
        'tugas_kelas.judul', 'tugas_kelas.deskripsi', 'tugas_kelas.tipe', 'tugas_kelas.tenggat', 'tugas_kelas.created_at',
        'mata_pelajaran.nama as nama_matpel',
        'file_tugas_siswa.file'
        )
        ->get();

        return response()->json([
            "index_class_siswa" => $classroomData
        ]);
    }
}