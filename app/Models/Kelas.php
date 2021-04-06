<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable =['id','tingkatan','jurusan'];
    protected $guarded = ['id'];
}
