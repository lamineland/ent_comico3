<?php

namespace App\Filament\Admin\Resources\MembreResource\Pages;

use App\Filament\Admin\Resources\MembreResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMembre extends CreateRecord
{
    protected static string $resource = MembreResource::class;

    protected function beforeCreate(): void
    {
        // remove '-' from telephone
        $this->data['telephone'] = str_replace('-', '', $this->data['telephone']);
    }
}
