<?php

namespace App\Filament\Resources\PKLResource\Pages;

use App\Filament\Resources\PKLResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ListPKLS extends ListRecords
{
    protected static string $resource = PKLResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


    protected function query(): Builder
    {
        $query = parent::query();

        if (Auth::check() && Auth::user()->role === 'Siswa') {
            $siswaId = optional(Auth::user()->siswa)->id;

            if ($siswaId) {
                $query->where('siswa_id', $siswaId);
            } else {
                $query->whereRaw('1 = 0'); // Return empty set
            }
        }

        return $query;
    }
}
