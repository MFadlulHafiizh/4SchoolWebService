<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
