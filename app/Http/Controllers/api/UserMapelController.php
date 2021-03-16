<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\jadpel;
use App\Models\Ruangan;
use App\Models\kelas;
use App\Models\matpel;
use App\Http\Resources\jadpelres as jadpelRes;

class UserMapelController extends Controller
{
    //Get User Mapel
    public function usermapel(Request $request){


$jadwal = DB::table('jadwal_pelajaran')
->join('users', 'jadwal_pelajaran.id_user', '=', 'users.id')
->join('ruangan', 'jadwal_pelajaran.id_ruangan','=','ruangan.id')
->join('mata_pelajaran', 'jadwal_pelajaran.id_matpel','=','mata_pelajaran.id')
->join('kelas','jadwal_pelajaran.id_kelas','=','kelas.id')

->select(
    'jadwal_pelajaran.hari', 'jadwal_pelajaran.jam_mulai','jadwal_pelajaran.jam_selesai',
    'ruangan.nama as ruangan','kelas.tingkatan','kelas.jurusan','mata_pelajaran.nama as mapel'
    )
->where('jadwal_pelajaran.id_user', '=', "$request->id")
->get();


return response()->json(array(
                'jadwal_mengajar' =>$jadwal
            )
        );


// SELECT jadwal_pelajaran.`hari`, jadwal_pelajaran.`jam_mulai`,jadwal_pelajaran.`jam_selesai`,
// ruangan.`nama`,kelas.`tingkatan`,kelas.`jurusan`,mata_pelajaran.`nama`
// FROM  jadwal_pelajaran


// JOIN users
// ON jadwal_pelajaran.`id_user` = users.`id`

// JOIN ruangan
// ON jadwal_pelajaran.`id_ruangan` = ruangan.`id`

// JOIN mata_pelajaran
// ON jadwal_pelajaran.`id_matpel` = mata_pelajaran.`id`

// JOIN kelas
// ON jadwal_pelajaran.`id_kelas` = kelas.`id`

// WHERE jadwal_pelajaran.`id_user` = "2"


    }

}
