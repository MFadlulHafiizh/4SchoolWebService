<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'session';
    protected $fillable =['id','type', 'value'];
    protected $guarded = ['id'];
}
