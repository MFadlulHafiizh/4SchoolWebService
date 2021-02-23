<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class uploadController extends Controller
{
    public function uploadImageDecoded(Request $request, $id){

        $users = User::firstWhere('id', $id);

        $uploadFolder = 'userimage';
        $image = $request->photo;
        // $image_uploaded_path = $image->store($uploadFolder, 'public');
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = str_random(10).'.'.'jpeg';
        Storage::disk('public')->put($imageName, base64_decode($image));

        $uploadedImageResponse = array(
            "image_name" => basename($imageName),
            "image_url" => url("storage/".$imageName),
        );
        //url
        $photo_url = $uploadedImageResponse['image_url'];
        //update        
        if($users){
            User::where('id',$id)->update(['photo' => $photo_url]);
        }
        return response()->json($uploadedImageResponse, 201);
        
        

    }

    public function getPhoto(Request $request)
    {
        $photo = DB::table('users')
            ->select('photo')
            ->where('id', $request->id)
            ->get();

        return response()->json($photo);
    }
}
