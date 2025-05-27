<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PKL extends Model
{
    protected $table = 'pkls';

    protected $fillable = [
        'siswa_id',
        'guru_id',
        'industri_id',
        'mulai',
        'selesai',
    ];

    public $timestamps = true;

    protected static function booted()
    {
        static::created(function ($pkl) {
            if ($pkl->siswa) {
                $pkl->siswa->update(['status_pkl' => 'Sudah']);
            }
        });
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class);
    }

    public function industri(): BelongsTo
    {
        return $this->belongsTo(Industri::class);
    }
}
