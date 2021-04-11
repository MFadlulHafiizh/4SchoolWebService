<?php

namespace App\Http\Controllers\api;
use App\Http\Resources\User as UserResource;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController;
use App\Http\Controllers\api\AuthController;
use App\Http\Requests\RegisterRequest;


class RegisterController extends Controller
{
    public function register(RegisterRequest $request, $role)
    {
        //validation input request & email checking
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:50',
            'email'    => 'required|email|max:50|unique:users,email',
            'password' => 'required|min:6',
        ]);
        
        if ($validator->fails()) {
            return response(['Registration Failed',$validator->errors()],422);
        }

        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $credentials = $request->only('email', 'password');
        $token = auth()->attempt($credentials);
            
            return (new UserResource($request->user()))
                ->additional(['meta' => [
                    'key' => $token,
                ]]);
    }

}
