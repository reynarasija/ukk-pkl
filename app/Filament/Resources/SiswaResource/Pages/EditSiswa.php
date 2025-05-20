<?php

namespace App\Filament\Resources\SiswaResource\Pages;

use App\Filament\Resources\SiswaResource;
use App\Models\Siswa;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditSiswa extends EditRecord
{
    protected static string $resource = SiswaResource::class;

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // Update user data
        $record->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'] ?? $record->password,
        ]);

        // Update or create siswa data
        $siswa = Siswa::updateOrCreate(
            ['id' => $record->id],
            [
                'nama' => $data['name'],
                'nis' => $data['nis'],
                'alamat' => $data['alamat'],
                'kontak' => $data['kontak'],
                'status_pkl' => $data['status_pkl'],
                'gender' => $data['gender'],
            ]
        );

        return $record;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}