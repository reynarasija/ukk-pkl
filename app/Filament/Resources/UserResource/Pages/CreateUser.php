<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Siswa;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function afterCreate(): void
    {
        $user = $this->record;

        // Check if user has "Siswa" role
        if ($user->hasRole('Siswa')) {
            // Create related siswa record
            Siswa::create([
                'id' => $user->id,
                'nama' => $user->name,
                'email' => $user->email,
            ]);

            $siswa = Siswa::where('email', $user->email)->first();

            if ($siswa) {
                $user->siswa_id = $siswa->id;
                $user->save();
            }
        }
    }
}
