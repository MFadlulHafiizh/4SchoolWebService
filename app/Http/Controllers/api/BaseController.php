<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Validator;


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

    public function updateprofile(Request $request, $id_user)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'nis'   => 'required',
            'nip'   => 'required',
            'kelas' => 'required',
            'profesi' => 'required',
            'tanggal_lahir' => 'required',
        ],
            [
                'name.required' => 'Masukkan name  !',
                'nis.required' => 'Masukkan nis  !',
                'nip.required' => 'Masukkan nip  !',
                'kelas.required' => 'Masukkan kelas  !',
                'profesi.required' => 'Masukkan Profesi  !',
                'tanggal_lahir.required' => 'Masukkan tanggal_lahir  !',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = User::whereId($id_user)->update([
                'name'     => $request->input('name'),
                'nis'   => $request->input('nis'),
                'nip'   => $request->input('nip'),
                'id_kelas'   => $request->input('kelas'),
                'profesi'   => $request->input('profesi'),
                'tanggal_lahir'   => $request->input('tanggal_lahir'),
                
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Profile Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Profile Gagal Diupdate!',
                ], 401);
            }

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
            return response()->json(["faq_list" => $faq]);
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
            $file = DB::table('file_tugas_siswa')->where('id_tugas_kelas', $id_tugas)->where('id_siswa', $request->id_siswa)->get();
            return response()->json(["filesDetail" => $file]);
        }
        

    }
}
