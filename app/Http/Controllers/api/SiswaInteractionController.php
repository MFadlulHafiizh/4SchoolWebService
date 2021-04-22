<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use App\Models\Tugas_kelas;
use Illuminate\Support\Facades\Validator;
use App\User;
Use \Carbon\Carbon;


class SiswaInteractionController extends Controller
{
    // get siswa schedule
    public function SiswaSchedule(Request $request){
        $date = Carbon::now()->format('h:i');
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
        ->where('jadwal.id_kelas', '=', $request->id_kelas)
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
        ->leftJoin(
            'file_tugasteori_guru', 
            'file_tugasteori_guru.id_tugas_kelas', 
            '=', 
            'tugas_kelas.id')
        ->leftJoin('file_tugas_siswa', 'tugas_kelas.id', '=', 'file_tugas_siswa.id_tugas_kelas')
        ->where('tugas_kelas.id_jadwal', $id_jadwal)
        ->select(
        'tugas_kelas.id','tugas_kelas.judul', 'tugas_kelas.deskripsi', 'tugas_kelas.tipe', 'tugas_kelas.tenggat', 'tugas_kelas.created_at',
        'mata_pelajaran.nama as nama_matpel',
        'file_tugas_siswa.file', 'file_tugasteori_guru.file'
        )
        ->groupBy('tugas_kelas.id')
        ->get();

        return response()->json([
            "index_class_siswa" => $classroomData
        ]);
    }

public function updateprofile(Request $request, $id_user)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'id_user'     => 'required',
            'nis'   => 'required',
            'kelas' => 'required',
            'tanggal_lahir' => 'required',
        ],
            [
                'name.required' => 'Masukkan name  !',
                'nis.required' => 'Masukkan nis  !',
                'kelas.required' => 'Masukkan kelas  !',
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
                'id_kelas'   => $request->input('kelas'),
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

    public function showkelas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tingkatan'     => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => "tingkatan required",
            ], 401);
        }
        $kelas = DB::table('kelas')
        ->select('kelas.id as id_kelas','kelas.tingkatan','kelas.jurusan')
        ->where('tingkatan', '=', "$request->tingkatan")
        ->get();

        // if ($request->tingkatan  != 'XII','XI','XIII') {
        //     return response()->json("Class Not Found",404);
        // }else{
            return response()->json([
                'success' => true,
                'kelas' => $kelas,
            ], 200);
        // }

    }

    public function assignTask(Request $request, $id_tugas_kelas){

        foreach($request->file('file') as $file){
            $filenameWithExt = $file->getClientOriginalName();
            // Get nama 
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            // Get  extensi
            $extension = $file->getClientOriginalExtension();
            //gabung nama dan ori extensi 
            $fileNameToStore = $id_tugas_kelas.$filename.'_'.time().'.'.$extension;                       
            // Upload file nya
            $destination_path = public_path('/storage/file/FileTugasSiswa');
            $path = $file->move($destination_path,$fileNameToStore);
            $withurl = url("storage/file/FileTugasSiswa/".$fileNameToStore);
            $assignTask = DB::table('file_tugas_siswa')
            ->insert([
                ['id_siswa'=>"$request->id_siswa",'id_tugas_kelas' => "$id_tugas_kelas",'name_file'=>$filename,'extensi'=>$extension,'file' => "$withurl", 'status' => "$request->status"],
            ]);
        }
       
        if($assignTask){
            return response()->json([
                $assignTask
                ]);
        }
    }
}