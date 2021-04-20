<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function users(Request $request){
        $users = \DB::table('users')->get();
        return view('admin.datausers', compact('users'));
    }
    public function destroy($id){
        $users = \DB::table('users')->where('id',$id)->delete();

        return redirect()->back()->with('success', 'Users deleted!');
    }
}