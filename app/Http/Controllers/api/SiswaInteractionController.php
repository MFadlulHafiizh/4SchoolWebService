<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
            'hari.hari',
            'jadwal.jam_mulai',
            'jadwal.jam_selesai',
            'ruangan.nama as ruangan' ,
            'mata_pelajaran.nama as mapel',
            'kelas.id as id_kelas'
        )
        ->where('jadwal.id_kelas', '=', "$request->id_kelas")
        ->get();
        if (empty("$request->id_kelas")) {
            return response()->json("Schedule Not Found",404);
        }else {
        return response()->json(array(
            'jadwal_pelajaran' =>$jadwal
        )   
            );
        }
    }
}