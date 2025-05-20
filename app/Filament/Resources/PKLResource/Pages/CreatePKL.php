<?php

namespace App\Filament\Resources\PKLResource\Pages;

use App\Filament\Resources\PKLResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePKL extends CreateRecord
{
    protected static string $resource = PKLResource::class;

    protected function beforeCreate(array $data): array
    {
        if (Auth::check() && Auth::user()->role === 'Siswa') {
            $data['siswa_id'] = Auth::user()->siswa->id;
        }

        return $data;
    }

    protected function afterCreate(): void
    {
        $pkl = $this->record; // The created PKL record

        $siswa = $pkl->siswa;
        if ($siswa) {
            $siswa->status_pkl = 'Sudah';
            $siswa->save();
        }
    }
}
