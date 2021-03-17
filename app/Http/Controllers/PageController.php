<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

use function Ramsey\Uuid\v1;

class PageController extends Controller
{
    public function index()
    {
        $data['lantai'] = [1, 2];
        $data['blok'] = ['A','B','C','D','E','F','G','H'];
        $data['tipe'] = ['Labolatorium', 'Kelas'];
        $data['status'] = ['Kosong', 'Digunakan'];
         
        $dataB1 = Ruangan::where('blok', 'B')->where('lantai','1')->skip(2)->take(4)->orderBy('nama', 'desc')->get();

        $dataB2 = Ruangan::where('blok', 'B')->where('lantai', '1')->skip(4)->take(2)->get();
        
        $dataC1 = Ruangan::where('blok', 'C')->where('lantai','1')->where('nama','C 1.1')->get();

        $dataC2 = Ruangan::where('blok', 'C')->where('lantai','1')->where('nama','C 1.2')->get();

        $dataC3 = Ruangan::where('blok', 'C')->where('lantai','1')->where('nama','C 1.3')->get();

        $dataC4 = Ruangan::where('blok', 'C')->where('lantai','2')->get();

        $dataD1 = Ruangan::where('blok', 'D')->where('lantai', '1')->get();

        $dataD2 = Ruangan::where('blok', 'D')->where('lantai', '2')->get();

        $dataE1 = Ruangan::where('blok', 'E')->where('lantai', '1')->get();

        $dataE2 = Ruangan::where('blok', 'E')->where('lantai', '2')->get();

        $dataG1 = Ruangan::where('blok', 'G')->where('lantai', '1')->get();

        $dataG2 = Ruangan::where('blok', 'G')->where('lantai', '2')->get();

        return view('index', compact('dataD1', 'dataD2', 'dataE1', 'dataE2', 'dataG1', 'dataG2', 'dataC1', 'dataC2', 'dataC3','dataC4', 'dataB1', 'dataB2', 'data'));

        //dd($dataD);

    }

    public function show($id)
    {
       // echo $id;
        $roomdata = Ruangan::find($id);
       // return view('index', compact('roomdata'));
       return view('room-show', compact('roomdata'));
    }
}
