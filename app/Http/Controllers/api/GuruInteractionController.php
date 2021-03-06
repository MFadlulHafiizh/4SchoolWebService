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
Use \Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
class GuruInteractionController extends Controller
{

//Get GuruMapel//
public function GuruSchedule(Request $request){
        $date = Carbon::now()->format('h:i');
        // $newdate = $date->toTimeString()->format('h:i');
        $profesi = DB::table('users')->select('profesi')->where('id', $request->id)->pluck('profesi')[0];
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
                'mata_pelajaran.nama as mapel',
                'kelas.id as id_kelas',
                'kelas.tingkatan',
                'kelas.jurusan',
                )
            ->where('jadwal.id_user', '=', $request->id)
            ->orderBy('jadwal.jam_mulai', 'asc')
            ->get();
    
                if (empty($request->id)) {
                            return response()->json("Schedule Not Found",404);
                    }else {
                        return $newreturn = response()->json(array(
                            'jadwal_mengajar' =>$jadwal
                    )
                );
            }
            // if ($ = null ) {
            //     return response()->json('there are no schedules today..');
            // }

       
    }

    public function tugas_kelas(Request $request, $id_jadwal)
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
            'id_jadwal'     => $id_jadwal,
            'judul'         => $request->judul,
            'deskripsi'     => $request->deskripsi,
            'tipe'          => $request->tipe,
            'tenggat'       => $request->tenggat

        ]);
        $tugas_create->save();

        $id = DB::getPdo('Tugas_kelas')->lastInsertId();
        // if(@!empty($request->file)){
        //     $file = $request->file->getClientOriginalName();
        //     $fileName = $id.$file;  
        //     Storage::disk('public')->put($fileName,$file);
        //     $withurl = url("storage/".$fileName);
        //     $file_tugas_teori_guru = DB::table('file_tugasteori_guru')
        //     ->insert([
        //         ['id_tugas_kelas' => "$id",'file' => "$withurl"],
        //     ]);
        //     if($file_tugas_teori_guru){
        //         return response()->json([
        //             $tugas_create,
        //             $file_tugas_teori_guru
        //             ]);
        //     }
        // }
        if(@!empty($request->file)){
            foreach($request->file('file') as $key=>$file){
                $filenameWithExt = $file->getClientOriginalName();
                // Get nama 
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
                // Get  extensi
                $extension = $file->getClientOriginalExtension();
                //gabung nama dan ori extensi 
                $fileNameToStore = $id.$filename.'_'.time().'.'.$extension;                       
                // Upload file nya
                $destination_path = public_path('/storage/file/FileUploadedGuru');
                $path = $file->move($destination_path,$fileNameToStore);
                $withurl = url("storage/file/FileUploadedGuru/".$fileNameToStore);
                $file_tugas_teori_guru = DB::table('file_tugasteori_guru')
                ->insert([
                    ['id_tugas_kelas' => "$id",'name_file'=>$filename,'extensi'=>$extension,'file' => "$withurl"],
                ]);
            }
           
            if($file_tugas_teori_guru){
                return response()->json([
                    $tugas_create,
                    $file_tugas_teori_guru
                    ]);
            }
        }
        return  response()->json(["result" => $tugas_create, "message" => "task success created"],201);
    }



    public function IndexClassroom(Request $request, $id_jadwal)
    {
        $classroom = DB:: table('tugas_kelas')
        ->join('jadwal', 'tugas_kelas.id_jadwal', '=', 'jadwal.id')
        ->join('mata_pelajaran', 'jadwal.id_matpel', '=', 'mata_pelajaran.id')
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
            'tugas_kelas.id',
            'tugas_kelas.judul', 
            'tugas_kelas.deskripsi', 
            'mata_pelajaran.nama',
            'tugas_kelas.tenggat',
            'tugas_kelas.tipe', 
            'tugas_kelas.created_at',
            DB::raw("COUNT(file_tugas_siswa.id_siswa) AS completed_count"),
            'file_tugasteori_guru.file')
        ->where('tugas_kelas.id_jadwal', '=', $id_jadwal)
        ->groupBy('tugas_kelas.id')
        ->orderBy('tugas_kelas.created_at', 'desc')
        ->get();

        return response()->json([
            'index_class_guru' =>$classroom
        ]);
    }

    public function showCompletedUser(Request $request){
        $data = DB::table('users')->join('file_tugas_siswa', 'users.id', '=', 'file_tugas_siswa.id_siswa')
        ->select('users.id','users.name', 'users.nis', 'users.photo')->where('file_tugas_siswa.id_tugas_kelas', $request->id_tugas_kelas)
        ->groupBy('file_tugas_siswa.id_siswa')->get();

        return response()->json(["completed_user" => $data]);
    }

    public function setNilai(Request $request){
        foreach($request->id_tugas as $id_assignment){
            $first = DB::table('file_tugas_siswa')->where('id', $id_assignment)->first();

            if($first){
                $update = DB::table('file_tugas_siswa')->where('id', $id_assignment)->update([
                    "nilai" => $request->nilai
                ]);
            }
        }
        return response()->json($update);

    }

// backup

    // public function IndexClassroom(Request $request, $id_jadwal)
    // {
    //     $classroom = DB:: table('tugas_kelas')
    //     ->join('jadwal', 'tugas_kelas.id_jadwal', '=', 'jadwal.id')
    //     ->join('mata_pelajaran', 'jadwal.id_matpel', '=', 'mata_pelajaran.id')
    //     ->leftJoin(
    //         'file_tugasteori_guru', 
    //         'file_tugasteori_guru.id_tugas_kelas', 
    //         '=', 
    //         'tugas_kelas.id')
    //     ->leftJoin(
    //         'file_tugas_siswa', 
    //         'file_tugas_siswa.id_tugas_kelas', 
    //         '=', 
    //         'tugas_kelas.id')
    //     ->select(
    //         'tugas_kelas.id',
    //         'tugas_kelas.judul', 
    //         'tugas_kelas.deskripsi', 
    //         'mata_pelajaran.nama',
    //         'tugas_kelas.tenggat',
    //         'tugas_kelas.tipe', 
    //         'tugas_kelas.created_at',
    //         DB::raw("SUM(file_tugas_siswa.id) AS completed_count"),
    //         'file_tugasteori_guru.name_file',
    //         'file_tugasteori_guru.extensi',
    //         'file_tugasteori_guru.file')
    //     ->where('tugas_kelas.id_jadwal', '=', $id_jadwal)
    //     ->groupBy('tugas_kelas.id')
    //     ->get();

    //     return response()->json([
    //         'index_class_guru' =>$classroom
    //     ]);
    // }

    // public function showCompletedUser(Request $request){
    //     $data = DB::table('users')->join('file_tugas_siswa', 'users.id', '=', 'file_tugas_siswa.id_siswa')->where('file_tugas_siswa.id', $request->id_tugas)->get();

    //     return response()-json($data);
    // }

}
