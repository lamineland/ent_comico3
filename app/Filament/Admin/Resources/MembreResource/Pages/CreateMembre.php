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
        // save new User
        $user = User::create([
            'prenom' => $this->data['prenom'],
            'nom' => $this->data['nom'],
            'email' => $this->data['email'],
            'password' => bcrypt('password'),
        ]);
        
        $this->data['user_id'] = $user->id;

        // remove '-' from telephone
        $this->data['telephone'] = str_replace('-', '', $this->data['telephone']);
    }
}
