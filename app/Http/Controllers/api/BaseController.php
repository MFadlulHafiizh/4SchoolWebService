<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class BaseController extends Controller
{
    public function ResnponseOk($result, $code = 200, $massage = 'success')
    {
        $response =[
            'code' => $code,
            'data' => $result,
            'massage' => $massage,
        ];

        return response()->json($response, $code);
    }

    public function ResnponseError($error, $code = 422, $errorDetails = [])
    {
        $response = [
            'code' => $code,
            'error' => $error,
        ];

        if (!empty($errorDetails)) {
            $response['errorDetails'] = $errorDetails;
        }

        return response()->json($response, $code);
    }

    public function getHelp(){
        $help = DB::table('faq')->get();

        return response()->json($help, 200);
    }

    public function updateProfile(Request $request, $id) {
        $user = User::firstWhere('id', $id);
        if($user) {
            $update = DB::table('users')->where('users.id', $id)->update([
                'name' => $request->name,
                'nip' => $request->nip,
                'nis' => $request->nis,
                'photo' => $request->photo,
                'role' => $request->role,
                'email' => $request->email
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Success update data',
                'data'    => $update
            ], 200);

        } else {
            return response([
                'success' => false,
                'message' => 'Failed update data',
            ], 404);
        }
    }

    public function getUserInfo(Request $request){
        $getRole = User::select('role')->where('id', $request->id)->pluck('role')[0];
        
        if($getRole == "siswa"){
        $userInfo = DB::table('users')
        ->select('kelas.tingkatan', 'kelas.jurusan')
        ->join('kelas', 'users.id_kelas', '=', 'kelas.id')
        ->where('users.id', $request->id)->first();
        }else{
        $userInfo = DB::table('users')
        ->select('mata_pelajaran.nama as profesi')
        ->join('mata_pelajaran', 'users.profesi', '=', 'mata_pelajaran.id')
        ->where('users.id', $request->id)->first();
        }

        return response()->json(['information'=>$userInfo]);
    }

    public function getFaq(Request $request){
        $faq = DB::table('faq')->get();

        if($faq){
            return response()->json($faq);
        }else{
            return response()->json(["message" => 'error'], 402);
        }
    }

    
    public function itemFile(Request $request, $id_tugas){
        $condition = $request->condition;
        if($condition == 'file_guru'){
            $file = DB::table('file_tugasteori_guru')->where('id_tugas_kelas', $id_tugas)->get();
            return response()->json(["filesDetail" => $file]);
        }
        else if($condition == 'file_siswa'){
            $file = DB::table('file_tugas_siswa')->where('id_tugas_kelas', $id_tugas)->get();
            return response()->json(["filesDetail" => $file]);
        }
        

    }
}
