<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function tambahUser()
    {
        return view('tambahUser.addUser');
    }

    public function tambahMatpel()
    {
        return view('tambahMatpel.addMatpel');
    }
}
