<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    
    protected $table = 'ruangan';
    protected $fillable =['id','nama'];
    protected $guarded = ['id'];
}
