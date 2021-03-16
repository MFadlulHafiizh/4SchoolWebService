<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadpel extends Model
{
    protected $table = 'jadwal_pelajaran';
    protected $fillable = 
    ['id',
    'hari',
    'jam_mulai',
    'jam_selesai',
    'id_ruangan',
    'id_matpel',
    'id_kelas'];
}
