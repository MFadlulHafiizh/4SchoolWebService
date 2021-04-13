<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Notifications\Notifiable;
use App\PasswordReset;
use App\Notifications\ForgotPasswordNotif;
use App\Notifications\ResetPasswordNotif;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function forgot(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
        ]);

        if ($validator->fails()) {
            return response([$validator->errors()],422);
        }        
        $user = User::where('email', $request->email)->first();        
        if (!$user)
            return response()->json([
                'message' => 'We cant find a user with that e-mail address.'
            ], 404);
                    
            $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => Str::random(50)
            ]
        );        
        if ($user && $passwordReset)
            $user->notify(
                new ForgotPasswordNotif($passwordReset->token)
            );        return response()->json([
            'message' => 'Check your E-mail for password reset!'
        ]);
    }

    public function find($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();        
            if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);        
            if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        }
           
        return response()->json($passwordReset);
    }


    public function reset(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required',
            'token' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response([$validator->errors()],422);
        }        
        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();

        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid. Please request new forgot password..'
            ], 404);        
            
            $user = User::where('email', $passwordReset->email)->first();        

            if (!$user)
            return response()->json([
                'message' => 'We cant find a user with that e-mail address.'
            ], 404);

            $user->password = Hash::make($request->password);
            $user->save();        
            $passwordReset->delete();        
            $user->notify(new ResetPasswordNotif($passwordReset));        
            return response()->json([
                'message' => 'Password changed succesfully..'
            ],200);
    }
}
