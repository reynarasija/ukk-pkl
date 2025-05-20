<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industri extends Model
{
    protected $fillable = [
        'id',
        'nama',
        'bidang_usaha',
        'alamat',
        'kontak',
        'email',
    ];
}
