<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $guru = DB::table('users')->where('role', 'guru')->get();
        
        $matpel = DB::table('mata_pelajaran')->get();

        $hari = DB::table('hari')->get();

        $ruangan = DB::table('ruangan')->get();

        $kelas = DB::table('kelas')->get();

        return view('matpel.index', compact('guru','matpel', 'hari', 'ruangan', 'kelas'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //  dd($request);
        $validator = Validator::make($request->all(), [
            'id_user'     => 'required',
            'id_matpel'   => 'required',
            'id_hari'   => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'id_ruangan' => 'required',
            'id_kelas' => 'required',
            ]
        );

        if($validator->fails()) {

            return redirect()->back()->with('fail', 'Jadwal gagal ditambah, Silakan isi semua field terlebih dahulu');

        } else {

            $input = $request->all();
            unset($input['_token']);
            $status = DB::table('jadwal')->insert($input);
            return redirect()->back()->with('success', 'Jadwal berhasil ditambah');

            $optionBuilder = new OptionsBuilder();
            $optionBuilder->setTimeToLive(60*20);

            $notificationBuilder = new PayloadNotificationBuilder('Jadwal Baru');
            $notificationBuilder->setBody('Lihat Jadwal Baru')
                                ->setSound('default');
            
            $dataBuilder = new PayloadDataBuilder();
            $dataBuilder->addData(['a_data' => 'my_data']);
            
            $option = $optionBuilder->build();
            $notification = $notificationBuilder->build();
            $data = $dataBuilder->build();

            $tokens = DB::table('users')->select('users.fcm_token')->toArray();

            $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);
            
            $downstreamResponse->numberSuccess();
            $downstreamResponse->numberFailure();
            $downstreamResponse->numberModification();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function upload_img()
    {
        
    }
}
