<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class GuruInteractionController extends Controller
{

//Get GuruMapel//
public function GuruSchedule(Request $request){

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
            'kelas.id as id_kelas',
            'kelas.tingkatan',
            'kelas.jurusan',
            )
        ->where('jadwal.id_user', '=', "$request->id")
        ->get();

            if (empty("$request->id")) {
                        return response()->json("Schedule Not Found",404);
                }else {
                    return response()->json(array(
                        'jadwal_mengajar' =>$jadwal
                )
            );
        }
    }

}
