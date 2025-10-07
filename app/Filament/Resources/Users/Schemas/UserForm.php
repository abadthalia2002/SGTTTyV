<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\DocumentType;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                /*   Select::make('document_type_id')
                    ->label('Tipo de documento')
                    ->relationship('documentType', 'abbreviation')
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('document_number')
                    ->label('Número de Documento')
                    ->required(), */

                Select::make('document_type_id')
                    ->label('Tipo de documento')
                    ->relationship('documentType', 'abbreviation')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state) {
                            $documentType = DocumentType::find($state);

                            if ($documentType) {
                                
                                $set('number_min_length', $documentType->number_min_length);
                                $set('number_max_length', $documentType->number_max_length);
                                $set('number_regex', $documentType->number_regex);
                            }
                        }
                    }),

                TextInput::make('document_number')
                    ->label('Número de Documento')
                    ->required()
                    ->reactive()
                    ->rule(function (callable $get) {
                        $min = $get('number_min_length');
                        $max = $get('number_max_length');
                        $regex = $get('number_regex');

                        $rules = [];
                        if ($min) $rules[] = "min:$min";
                        if ($max) $rules[] = "max:$max";
                        if ($regex) $rules[] = "regex:$regex";

                        return $rules;
                    })
                    ->helperText(function (callable $get) {
                        $min = $get('number_min_length');
                        $max = $get('number_max_length');

                        return ($min && $max)
                            ? "Debe tener entre {$min} y {$max} caracteres."
                            : null;
                    }),

                TextInput::make('number_min_length')->hidden(),
                TextInput::make('number_max_length')->hidden(),
                TextInput::make('number_regex')->hidden(),
                
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
