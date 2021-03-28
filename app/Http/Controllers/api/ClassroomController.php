<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    public function getInfoClass(Request $request){
        $info = DB::table('kelas')->join('users', 'users.id_kelas', '=', 'kelas.id')
        ->select(array('kelas.*', DB::raw('COUNT(users.id) as class_member')))
        ->where('kelas.id', $request->id_kelas)->first();

        return response()->json([
            'class_info' => $info
            ]);
    }
}
