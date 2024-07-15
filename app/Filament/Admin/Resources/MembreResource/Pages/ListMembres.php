<?php

namespace App\Filament\Admin\Resources\MembreResource\Pages;

use App\Filament\Admin\Resources\MembreResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMembres extends ListRecords
{
    protected static string $resource = MembreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
