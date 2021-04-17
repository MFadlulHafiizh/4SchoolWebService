<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas_kelas extends Model
{
    protected $table = 'tugas_kelas';
    protected $fillable =[
                            'id_jadwal',
                            'judul',
                            'deskripsi',
                            'tipe',
                            'tenggat',
                            'created_at',
                            'updated_at'
                        ];
    protected $guarded = ['id'];
}
