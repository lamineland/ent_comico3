<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MembreResource\Pages;
use App\Filament\Admin\Resources\MembreResource\RelationManagers;
use App\Models\Membre;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;

class MembreResource extends Resource
{
    protected static ?string $model = Membre::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        // make input for this 'telephone', 'cite', 'etat', 'fonction', 'numero_villa', 'detail_logement', 'date_amenagement', 'user_id',
        return $form
            ->schema([
                TextInput::make('prenom')
                            ->required()
                            ->hiddenLabel()
                            ->placeholder('Prénom')
                            ->minLength(2)
                            ->maxLength(155),
                TextInput::make('nom')
                            ->required()
                            ->hiddenLabel()
                            ->placeholder('Nom')
                            ->minLength(2)
                            ->maxLength(85),
                TextInput::make('email')
                            ->required()
                            ->email()
                            ->hiddenLabel()
                            ->placeholder('Email'),
                Textinput::make('telephone')
                            ->required()
                            ->placeholder('Téléphone: 99 999 99 99')
                            ->hiddenLabel()
                            ->tel()
                            ->mask(RawJs::make(<<<'JS'
                                '99-999-99-99'
                            JS)),
                Select::make('cite')
                            ->placeholder('Choisir la cité')
                            ->required()
                            ->options([
                                'CPI' => 'CPI',
                                'Comico' => 'Comico',
                            ])
                            ->hiddenLabel(),
                Select::make('etat')
                            ->placeholder('Choisir l\'état')
                            ->required()
                            ->options([
                                'Actif' => 'Actif',
                                'Inactif' => 'Inactif',
                                'Déménagé' => 'Déménagé'
                            ])
                            ->hiddenLabel(),
                TextInput::make('fonction')
                            ->hiddenLabel()
                            ->placeholder('Fonction')
                            ->maxLength(25),
                TextInput::make('numero_villa')
                            ->hiddenLabel()
                            ->placeholder('Numéro de Villa')
                            ->numeric(),
                DatePicker::make('date_amenagement')
                            ->hiddenLabel(),
                Textarea::make('detail_logement')
                            ->hiddenLabel()
                            ->placeholder('Détail du logement')
                            ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListMembres::route('/'),
            'create' => Pages\CreateMembre::route('/create'),
            'edit' => Pages\EditMembre::route('/{record}/edit'),
        ];
    }
}
