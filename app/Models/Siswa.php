<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'id',
        'nama',
        'nis',
        'gender',
        'alamat',
        'kontak',
        'email',
        'status_pkl',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'siswa_id', 'id');
    }
}
