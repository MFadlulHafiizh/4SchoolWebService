<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PetunjukController extends Controller
{
       
    public function index(Request $request){
        $petunjuk = \DB::table('faq')->get();
        return view('petunjuk.index', compact('petunjuk'));
    }

    public function create()
    {
        $petunjuk = \DB::table('faq')->get();
        return view('petunjuk.form', $petunjuk);
    }

    public function store(Request $request)
    {

        // $rule = [
        //     'name'      => 'required|string|max:50',
        //     'email'     => 'required|email|max:50',
        //     'password'  => 'required|min:6',
        //     'nis'       => 'required',
        //     'id_kelas'    => 'required'
        // ];
        // $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        $status = \DB::table('faq')->insert($input);

        if($status) {
            return redirect('/petunjuk')->with('success', 'Petunjuk berhasil ditambah');
        } else {
            return redirect()->back()->with('error','Petunjuk gagal ditambah');
        }
    }

    public function edit($id)
    {
        $data['petunjuk'] = \DB::table('faq')->find($id);
        return view('petunjuk.form', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        unset($input['_token'], $input['_method']);
        $status = \DB::table('faq')->where('id', $id)->update($input);

        if ($status) {
            return redirect('/petunjuk')->with('success', 'Petunjuk berhasil diupdate!');
        } else {
            return redirect()->back()->with('error', 'Petunjuk gagal di update!');
        }
    }

    public function destroy($id){
        $users = \DB::table('faq')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Petunjuk berhasil dihapus!');
    }
}