<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Tugas_kelas;
use Illuminate\Support\Facades\Storage;
class GuruInteractionController extends Controller
{

//Get GuruMapel//
public function GuruSchedule(Request $request){
        $profesi = DB::table('users')->select('profesi')->where('id', $request->id)->pluck('profesi')[0];
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
        ->where('jadwal.id_user', '=', $request->id)
        ->where('jadwal.id_matpel', '=', $profesi)
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

    public function tugas_kelas(Request $request,$id_kelas,$id_matpel)
    {
        $validator = Validator::make($request->all(), [
            // 'id_kelas'     => 'required|max:50',
            // 'id_matpel'    => 'required|max:50',
            'judul'        => 'required|max:50',
            'deskripsi'    => 'required',
            'tipe'         => 'required',
            // 'tenggat'      => 'required',
            //'file' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response(['Task created failed..',$validator->errors()],422);
        }

        $tugas_create = Tugas_kelas::create([
            'id_kelas'     => $id_kelas,
            'id_matpel'    => $id_matpel,
            'judul'        => $request->judul,
            'deskripsi'    => $request->deskripsi,
            'tipe'         => $request->tipe,

        ]);
        $tugas_create->save();

        $id = DB::getPdo('Tugas_kelas')->lastInsertId();
        if(@!empty($request->file)){
            $file = $request->file->getClientOriginalName(); 
            $fileName = $id.$file;  
            Storage::disk('public')->put($fileName,$file);
            $file_tugas_teori_guru = DB::table('file_tugasteori_guru')
            ->insert([
                ['id_tugas_kelas' => "$id",'file' => "$fileName"],
            ]);
            if($file_tugas_teori_guru){
                return response()->json([
                    $tugas_create,
                    $file_tugas_teori_guru
                    ]);
            }
        }else{
            return $this->tugasCreate($id_kelas, $id_matpel, $request->judul, $request->deskripsi, $request->tipe);
        }
        return  response()->json("task success created",201);
    }

    public function tugasCreate($id_kelas, $id_matpel, $judul, $deskripsi, $tipe){
        
    }

    public function IndexClassroom(Request $request, $id_kelas)
    {
        $classroom = DB:: table('tugas_kelas')
        ->leftJoin(
            'file_tugasteori_guru', 
            'file_tugasteori_guru.id_tugas_kelas', 
            '=', 
            'tugas_kelas.id')
        ->leftJoin(
            'file_tugas_siswa', 
            'file_tugas_siswa.id_tugas_kelas', 
            '=', 
            'tugas_kelas.id')
        ->select(
            'tugas_kelas.judul', 
            'tugas_kelas.deskripsi', 
            'tugas_kelas.tenggat',
            'tugas_kelas.tipe', 
            'tugas_kelas.created_at',
            DB::raw("SUM(file_tugas_siswa.id) AS completed_count"),
            'file_tugasteori_guru.file')
        ->where('tugas_kelas.id_kelas', '=', $id_kelas)
        ->get();

        return response()->json([
            'index_class_guru' =>$classroom
        ]);
    }

}
