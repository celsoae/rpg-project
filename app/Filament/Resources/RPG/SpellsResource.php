<?php

namespace App\Filament\Resources\RPG;

use App\Filament\Resources\RPG\SpellsResource\Pages;
use App\Filament\Resources\RPG\SpellsResource\RelationManagers;
use App\Models\RPG\Spells;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpellsResource extends Resource
{
    protected static ?string $model = Spells::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('school'),
                Tables\Columns\TextColumn::make('components'),
                Tables\Columns\TextColumn::make('casting_time'),
                Tables\Columns\TextColumn::make('range'),
                Tables\Columns\TextColumn::make('target'),
                Tables\Columns\TextColumn::make('effect'),
                Tables\Columns\TextColumn::make('saving_throw'),
            ])
            ->filters([
                //
            ])
            ->actions([
//                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSpells::route('/'),
//            'create' => Pages\CreateSpells::route('/create'),
//            'edit' => Pages\EditSpells::route('/{record}/edit'),
        ];
    }
}
