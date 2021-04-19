<?php

namespace App\Http\Controllers\api;
use App\Http\Resources\User as UserResource;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController;
use App\Http\Controllers\api\AuthController;
use App\Http\Requests\RegisterRequest;


class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        //validation input request & email checking
        if($request->role == "siswa"){
            $validator = Validator::make($request->all(), [
                'name'      => 'required|string|max:50',
                'email'     => 'required|email|max:50|unique:users,email',
                'password'  => 'required|min:6',
                'nis'       => 'required|string',
                'tingkatan' => 'required|string',
                'jurusan'   => 'required|string',
                'urutan'    => 'required|string',
                'foto'      => 'required|string'
            ]);
        }
        
        if($request->role == "guru"){
            $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:50',
            'email'     => 'required|email|max:50|unique:users,email',
            'password'  => 'required|min:6',
            'nip'       => 'required|string',
            'profesi'   => 'required|string',
            'foto'      => 'required|string'
            
        ]);
        }
        
        
        if ($validator->fails()) {
            return response(['Registration Failed',$validator->errors()],422);
        }

        $kelas = DB::table("kelas")
        ->select(
            'id_kelas'
        )
        ->where('tingkatan', '=' ,'$request->tingkatan')
        ->where('jurusan', '=' ,'$request->jurusan')
        ->where('urutan', '=' , '$request->urutan')
        ->get();

        $request->request->add(['kelas'=> $kelas]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'  => $request->role,
            'nis'   => $request->nis,
            'nip'   => $request->nip,
            'profesi'   => $request->profesi,
            'foto'   => $request->foto,
            'kelas'   => $request->kelas
        ]);

        $credentials = $request->only('email', 'password');
        $token = auth()->attempt($credentials);
            
        return (new UserResource($request->user()))
                ->additional(['meta' => [
                    'key' => $token
                ]]);
    }

    public function cekRegist(RegisterRequest $request){
        $statement = Session::select('value')->where('type', 'registration')->pluck('value')[0];

        if($statement == 'Close'){
            return response()->json([
                "status" => "closed"
            ]);
        }else if($statement == 'Open'){
            return response()->json([
                "status"        => "open",
                "registration"  => $this->register($request)
            ]);
        }else{
            return response()->json([
                "status" => "error",
            ]);
        }
    }
    
    public function statement(Request $request){
        if($request->statement == "Open"){
            $statement = Session::updateOrCreate(['type' => 'registration'], ['type' => 'registration','value' => 'Open', 'status' => $request->role]);
        }else{
            $statement = Session::updateOrCreate(['type' => 'registration'], ['type' => 'registration','value' => 'Close', 'status' => $request->role]);
            
        }

        return $statement->value;
        
        
    }
}