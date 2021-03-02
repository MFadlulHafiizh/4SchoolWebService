<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class PageController extends Controller
{
    public function index()
    {
        $data['lantai'] = [1, 2];
        $data['blok'] = ['A','B','C','D','E','F','G','H'];
        $data['tipe'] = ['Labolatorium', 'Kelas'];
        $data['status'] = ['Kosong', 'Digunakan'];
         

        $dataD1 = Ruangan::where('blok', 'D')->where('lantai', '1')->get();

        $dataD2 = Ruangan::where('blok', 'D')->where('lantai', '2')->get();

        $dataE1 = Ruangan::where('blok', 'E')->where('lantai', '1')->get();

        $dataE2 = Ruangan::where('blok', 'E')->where('lantai', '2')->get();

        $dataG1 = Ruangan::where('blok', 'G')->where('lantai', '1')->get();

        $dataG2 = Ruangan::where('blok', 'G')->where('lantai', '2')->get();

        return view('index', compact('dataD1', 'dataD2', 'dataE1', 'dataE2', 'dataG1', 'dataG2', 'data'));

        //dd($dataD);

    }
}
