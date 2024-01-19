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

    protected static ?string $navigationGroup = 'RPG';

    protected static ?string $label = 'Magias';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $activeNavigationIcon = 'heroicon-s-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Dados da magia')
                    ->icon('heroicon-s-adjustments-horizontal')
                    ->iconSize('md')
                    ->iconColor('success')
                    ->columns(6)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nome')
                            ->columnSpan(2)
                            ->required()
                            ->minLength(1)
                            ->maxLength(100),
                        Forms\Components\TextInput::make('level')
                            ->placeholder('Classe (Nivel), Classe (Nivel), ...')
                            ->label('Nivel')
                            ->columnSpan(2)
                            ->required(),
                        Forms\Components\Select::make('spell_resistance')
                            ->label('Resistência a Magia')
                            ->columnSpan(2)
                            ->options([
                                'Não',
                                'Sim',
                                'Sim (Objeto)',
                                'Sim (Inofensiva)',
                            ]),
                        Forms\Components\Select::make('school')
                            ->label('Escola')
                            ->columnSpan(2)
                            ->options([
                                'Evocation' => 'Evocação',
                                'Enchantment' => 'Encantamento',
                                'Conjuration' => 'Conjuração',
                                'Transmutation' => 'Transmutação',
                                'Necromancy' => 'Necromancia',
                                'Mind - Affecting' => 'Mente',
                                'Divination' => 'Advinhação',
                                'Illusion' => 'Ilusão',
                                'Universal' => 'Universal',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('saving_throw')
                            ->label('Teste de Resistência')
                            ->columnSpan(2)
                            ->minLength(1)
                            ->maxLength(100),
                        Forms\Components\TextInput::make('casting_time')
                            ->label('Tempo de Execução')
                            ->columnSpan(2)
                            ->required()
                            ->minLength(1)
                            ->maxLength(100),
                        Forms\Components\TextInput::make('range')
                            ->label('Alcance')
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('duration')
                            ->label('Duração')
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('target')
                            ->label('Tempo de Execução')
                            ->columnSpan('full'),
                        Forms\Components\Select::make('components')
                            ->label('Componentes')
                            ->columnSpan(2)
                            ->options([
                                'V',
                                'G',
                                'M',
                                'F',
                                'FD',
                                'XP',
                                'Ritual'
                            ])
                            ->multiple()
                            ->required(),
                        Forms\Components\RichEditor::make('effect')
                            ->columnSpan('full')
                            ->label('Efeito')
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('level')
                    ->label('Nivel')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('components')
                    ->label('Componentes')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('casting_time')
                    ->label('Tempo de Execução')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('range')
                    ->label('Alcance')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('target')
                    ->label('Alvos')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('effect')
                    ->label('Efeito')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('saving_throw')
                    ->label('Teste de Resistência')
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Detalhes'),
                Tables\Actions\EditAction::make()
                    ->label('Editar'),
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
