<?php

namespace App\Http\Controllers;

class CrudController extends Controller
{
    public function index()
    {
        return view('matpel.index');
    }

    public function tambah()
    {
        return view('matpel.form');
    }
}
