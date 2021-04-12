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

    public function getMemberClass(Request $request){
        $members = DB::table('users')->select('id', 'name', 'nis','email', 'photo')->where('id_kelas', $request->id_kelas)->paginate(10);
        $data = $members->flatten(1);
        $total_page = $members->lastPage();        
        return response()->json([
            "members"   => $data,
            "last_page" => $total_page
        ]);
    }
}
