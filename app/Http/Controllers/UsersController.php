<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request){
        $users = \DB::table('users')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $data['kelas'] = \DB::table('kelas')->get();
        $data['matpel'] = \DB::table('mata_pelajaran')->get();
        return view('users.form', $data);
    }

    public function store(Request $request)
    {
        // Rule
        if($request->role == "siswa"){
            $rule = [
                'name'      => 'required|string|max:50',
                'email'     => 'required|email|max:50',
                'password'  => 'required|min:6',
                'nis'       => 'required',
                'id_kelas'    => 'required'
            ];
        }
        if($request->role == "guru"){
            $rule = [
                'name'      => 'required|string|max:50',
                'email'     => 'required|email|max:50',
                'password'  => 'required|min:6',
                'nip'       => 'required',
                'profesi'   => 'required'
            ];
        }
        $this->validate($request, $rule);
        
        $input  = $request->all();
        $input['password'] = \Hash::make($request->password);

        unset($input['_token'], $input['switch']);
        $status = \DB::table('users')->insert($input);
        
        if ($status) {
            return redirect('/users')->with('success', 'Register Success');
        } else {
            return redirect()->back()->with('error', 'Register Failed');
        }
    }

    public function edit($id)
    {
        $data['kelas'] = \DB::table('kelas')->get();
        $data['matpel'] = \DB::table('mata_pelajaran')->get();
        $data['users'] = \DB::table('users')->find($id);
        return view('users.form', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        unset($input['_token'], $input['switch'], $input['_method'], $input['password']);
        $status = \DB::table('users')->where('id', $id)->update($input);

        if ($status) {
            return redirect('/users')->with('success', 'Register Success');
        } else {
            return redirect()->back()->with('error', 'Register Failed');
        }
    }

    public function destroy($id){
        $users = \DB::table('users')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Users deleted!');
    }
}