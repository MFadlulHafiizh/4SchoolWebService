<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Http\Controllers\api\BaseController;
use App\Http\Controllers\api\AuthController;
use App\Http\Requests\RegisterRequest;



class LoginController extends Controller
{
    public function login(RegisterRequest $request)
    {
        
    }
}
