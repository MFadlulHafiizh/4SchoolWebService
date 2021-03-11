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

        $jadpel = jadpel::where('id_user', $request->id)->get();
        $ruangan = Ruangan::where('id', $jadpel->first()->id_ruangan)->get("nama");
        $kelas = kelas::where('id', $jadpel->first()->id_kelas)->get("tingkatan");
        $matpel = matpel::where('id', $jadpel->first()->id_matpel)->get("nama");
        
            return response()->json(array(
                    'data'=> jadpelRes::collection(jadpel::all()),
                    'Ruangan' => $ruangan,
                    'Matpel' => $matpel,
                    'Kelas' => $kelas,
            )
        );
    }

}
