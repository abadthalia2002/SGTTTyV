<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('document_number')
                    ->label('Número de Documento')
                    ->required(),
                TextInput::make('name')
                    ->label('Nombres y Apellidos')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at')->label('Email Verificado'),
                TextInput::make('password')
                    ->label('Contraseña')
                    ->password()
                    ->required(),
                TextInput::make('address')
                    ->label('Dirección'),
                TextInput::make('phone')
                    ->label('Teléfono')
                    ->tel(),
                FileUpload::make('image')
                    ->label('Foto')
                    ->image(),
            ]);
    }
}
