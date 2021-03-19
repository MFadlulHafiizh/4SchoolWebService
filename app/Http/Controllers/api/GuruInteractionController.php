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

        $jadwal = DB::table('jadwal_pelajaran')
        ->join('users', 'jadwal_pelajaran.id_user', '=', 'users.id')
        ->join('ruangan', 'jadwal_pelajaran.id_ruangan','=','ruangan.id')
        ->join('mata_pelajaran', 'jadwal_pelajaran.id_matpel','=','mata_pelajaran.id')
        ->join('kelas','jadwal_pelajaran.id_kelas','=','kelas.id')
        ->select(
            'jadwal_pelajaran.hari', 'jadwal_pelajaran.jam_mulai','jadwal_pelajaran.jam_selesai',
            'ruangan.nama','kelas.tingkatan','kelas.jurusan','mata_pelajaran.nama'
            )

        ->where('jadwal_pelajaran.id_user', '=', "$request->id")
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