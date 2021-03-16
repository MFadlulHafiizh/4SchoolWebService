<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = 
    ['id',
    'tingkatan',
    'jurusan',
    'urutan',];
}
