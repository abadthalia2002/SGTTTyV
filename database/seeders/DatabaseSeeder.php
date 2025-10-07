<?php

namespace Database\Seeders;

use App\Constants\ValidationPatterns;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        \App\Models\DocumentType::create([
            'name' => 'Documento nacional de identidad',
            'abbreviation' => 'DNI',
            'number_min_length' => 8,
            'number_max_length' => 8,
            'number_regex' => ValidationPatterns::NUMBERS
        ]);
        \App\Models\DocumentType::create([
            'name' => 'Registro Único de Contribuyentes',
            'abbreviation' => 'RUC',
            'number_min_length' => 11,
            'number_max_length' => 11,
            'number_regex' => ValidationPatterns::NUMBERS_LETTERS
        ]);
        \App\Models\DocumentType::create([
            'name' => 'Pasaporte',
            'abbreviation' => 'PASAPORTE',
            'number_min_length' => 8,
            'number_max_length' => 12,
            'number_regex' => ValidationPatterns::NUMBERS
        ]);
        \App\Models\DocumentType::create([
            'name' => 'Otros',
            'abbreviation' => 'Otros',
            'number_min_length' => 8,
            'number_max_length' => 12,
            'number_regex' => ValidationPatterns::NUMBERS_LETTERS_SPACES
        ]);

        User::factory()->create([
            'document_number' => '12345678',
            'name' => 'Thalia Abad',
            'email' => 'thalia@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
