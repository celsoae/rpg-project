<?php

namespace App\Filament\Resources\RPG\SpellsResource\Pages;

use App\Filament\Resources\RPG\SpellsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpells extends ListRecords
{
    protected static string $resource = SpellsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
