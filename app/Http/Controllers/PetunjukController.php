<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PetunjukController extends Controller
{
       
    public function index(Request $request){
        $petunjuk = \DB::table('faq')->get();
        return view('petunjuk.index', compact('petunjuk'));
    }
}