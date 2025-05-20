<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PKLResource\Pages;
use App\Filament\Resources\PKLResource\RelationManagers;
use App\Models\PKL;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;


class PKLResource extends Resource
{
    protected static ?string $model = PKL::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        // If the logged-in user is a "Siswa", show only their PKL records
        if (Auth::check() && Auth::user()->role === 'Siswa') {
            $siswa = Auth::user()->siswa; // assumes User has siswa() relation

            if ($siswa) {
                $query->where('siswa_id', $siswa->id);
            } else {
                // If user is siswa but has no linked siswa profile, show nothing
                $query->whereNull('id');
            }
        }

        return $query;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Select::make('siswa_id')
                //     ->relationship('siswa', 'nama')
                //     ->default(fn() => Auth::check() && Auth::user()->siswa ? Auth::user()->siswa->id : null)
                //     ->disabled(fn() => Auth::check() && Auth::user()->role === 'Siswa')
                //     ->required()
                //     ->visible(fn() => Auth::check() && Auth::user()->role !== 'Siswa')
                //     ->hiddenOn('create'), // optional
                Forms\Components\Select::make('guru_id')
                    ->relationship('guru', 'nama')
                    ->required(),
                Forms\Components\Select::make('industri_id')
                    ->relationship('industri', 'nama')
                    ->required(),
                Forms\Components\DateTimePicker::make('mulai')
                    ->required()
                    ->label('Tanggal Mulai'),
                Forms\Components\DateTimePicker::make('selesai')
                    ->required()
                    ->label('Tanggal Selesai')
                    ->after('mulai'), // This ensures selesai date must be after mulai date
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->query(function (Builder $query) {
            //     if (Auth::check() && Auth::user()->role === 'Siswa') {
            //         $siswaId = optional(Auth::user()->siswa)->id;

            //         if ($siswaId) {
            //             $query->where('siswa_id', $siswaId);
            //         } else {
            //             $query->whereRaw('1 = 0');
            //         }
            //     }
            // })
            ->columns([
                Tables\Columns\TextColumn::make('siswa.nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('guru.nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('industri.nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPKLS::route('/'),
            'create' => Pages\CreatePKL::route('/create'),
            'edit' => Pages\EditPKL::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'PKL';
    }

    public static function getPluralModelLabel(): string
    {
        return 'PKL';
    }
}
