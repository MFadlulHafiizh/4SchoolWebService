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
        $validator = Validator::make($request->all(), [
                'name'      => 'required|string|max:50',
                'email'     => 'required|email|max:50|unique:users,email',
                'password'  => 'required|min:6'
        ]);
        
        
        if ($validator->fails()) {
            return response(['Registration Failed',$validator->errors()],422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'  => $request->role,
        ]);

        $credentials = $request->only('email', 'password');
        $token = auth()->attempt($credentials);
            
        return (new UserResource($request->user()))
                ->additional(['meta' => ['key' => $token]]);
    }

    // public function register(RegisterRequest $request)
    // {
    //     //validation input request & email checking
    //     $validator = Validator::make($request->all(), [
    //         'name'      => 'required|string|max:50',
    //         'email'     => 'required|email|max:50|unique:users,email',
    //         'password'  => 'required|min:6',
    //     ]);
        
    //     if ($validator->fails()) {
    //         return response(['Registration Failed',$validator->errors()],422);
    //     }

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role'  => $request->role
    //     ]);
    //     $credentials = $request->only('email', 'password');
    //     $token = auth()->attempt($credentials);
            
    //     return (new UserResource($request->user()))
    //             ->additional(['meta' => [
    //                 'key' => $token,
    //             ]]);
    // }

    public function cekRegist(Request $request){
        $statement = Session::select('value', 'status')->where('type', 'registration')->get();
        $value = $statement->pluck('value')[0];
        $role = $statement->pluck('status')[0];

        if($value == 'Close'){
            return response()->json([
                "status" => "closed",
                "role"  => $role
            ]);
        }else if($value == 'Open'){
            return response()->json([
                "status"        => "open",
                "role"  => $role,
                //"registration"  => $this->register($request)
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