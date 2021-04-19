<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\User;

class uploadController extends Controller
{
    //Upload Image Decode64
    public function uploadImageDecoded(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'photo'     => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return response(['Uploading Failed',$validator->errors()],422);
        }

        $users = User::firstWhere('id', $id);
        $cekImage = User::where('id',$id)->select('photo')->get();
        //update        
        if($users){
           $imageString = $cekImage->pluck('photo')[0];
           $subImage = Str::substr($imageString, -15);
           Storage::disk('public')->delete($subImage);
           return $this->uploadImage($request->photo, $id);
        }else{
            return $this->uploadImage($request->photo, $id);
        }
        
    }

    public function uploadImage($photo, $id){
        $uploadFolder = 'userimage';
        $image = $photo;
        //$image_uploaded_path = $image->store($uploadFolder, 'public');
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = str_random(10).'.'.'jpeg';
        Storage::disk('public')->put('//storage/userImage'.$imageName, base64_decode($image));
        $uploadedImageResponse = array(
            "image_name" => basename($imageName),
            "image_url" => url("public/storage/userImage".$imageName),
        );
        //url
        $photo_url = $uploadedImageResponse['image_url'];
        User::where('id',$id)->update(['photo' => $photo_url]);
        return response()->json($uploadedImageResponse,201);
    }

    //Get photo user
    public function getPhoto(Request $request)
    {
        $photo = DB::table('users')
            ->select('photo')
            ->where('id', $request->id)
            ->get();

        return response()->json($photo);
    }

}
