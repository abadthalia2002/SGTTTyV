<?php

namespace Database\Seeders;

use App\Constants\ValidationPatterns;
use App\Models\Infraction;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

        $user = User::factory()->create([
            'document_number' => '12345678',
            'name' => 'Thalia Abad',
            'email' => 'thalia@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $admin = Role::firstOrCreate(['name' => 'Administrador']);
        $permissions = Permission::all();

        $admin->syncPermissions($permissions);

        if ($user) {
            $user->assignRole($admin);
        }

        $uit = 5350;

        $infractionAsociation = [

            [
                'target' => 'asociación',
                'code' => 'PJ-1',
                'description' => 'Prestar el servicio de transporte público de pasajeros en vehículos menores (trimoto de pasajero) sin contar con el permiso de operación.',
                'type' => 'Muy Grave',
                'sanction_percentage' => 5,
                'complementary_measure' => 'Internamiento del vehículo por 15 días calendario',
                'amount' => $uit * 0.05,
            ],

            [
                'target' => 'asociación',
                'code' => 'PJ-2',
                'description' => 'Prestar el servicio de transporte público de pasajeros en vehículos menores (trimoto de pasajero) sin haber renovado el permiso de operación.',
                'type' => 'Muy Grave',
                'sanction_percentage' => 5,
                'complementary_measure' => 'Internamiento del vehículo por 15 días calendario. 1ra vez suspensión temporal.',
                'amount' => $uit * 0.05,
            ],

            [
                'target' => 'asociación',
                'code' => 'PJ-3',
                'description' => 'Omitir o falsear la información presentada al registro de vehículos menores del servicio público especial de pasajeros.',
                'type' => 'Muy Grave',
                'sanction_percentage' => 5,
                'complementary_measure' => '1ra vez suspensión por 30 días calendarios. 2da vez 90 días calendarios. 3ra vez anulación del permiso de operación.',
                'amount' => $uit * 0.05,
            ],

            [
                'target' => 'asociación',
                'code' => 'PJ-4',
                'description' => 'Utilizar un paradero no autorizado o realizar un mal uso del paradero.',
                'type' => 'Muy Grave',
                'sanction_percentage' => 5,
                'complementary_measure' => '2da vez suspensión por 30 días calendarios. 3ra vez anulación del permiso de operación.',
                'amount' => $uit * 0.05,
            ],

            [
                'target' => 'asociación',
                'code' => 'PJ-5',
                'description' => 'Permitir el servicio a unidades no habilitadas al transporte público especial de pasajeros (trimoto de pasajero).',
                'type' => 'Muy Grave',
                'sanction_percentage' => 5,
                'complementary_measure' => '1ra vez suspensión por 6 meses. 3ra vez anulación del permiso de operación.',
                'amount' => $uit * 0.05,
            ],

            [
                'target' => 'asociación',
                'code' => 'PJ-6',
                'description' => 'Modificar o adulterar los datos del permiso de operación.',
                'type' => 'Muy Grave',
                'sanction_percentage' => 5,
                'complementary_measure' => '2da vez suspensión por 6 meses. 3ra vez anulación del permiso de operación.',
                'amount' => $uit * 0.05,
            ],

            [
                'target' => 'asociación',
                'code' => 'PJ-7',
                'description' => 'Negarse a suministrar la información solicitada por la autoridad competente.',
                'type' => 'Muy Grave',
                'sanction_percentage' => 5,
                'complementary_measure' => 'Suspensión del permiso de operación por 6 meses.',
                'amount' => $uit * 0.05,
            ],

            [
                'target' => 'asociación',
                'code' => 'PJ-8',
                'description' => 'No mantener en buen estado de conservación, aseo e higiene el paradero.',
                'type' => 'Muy Grave',
                'sanction_percentage' => 5,
                'complementary_measure' => '1ra vez suspensión 30 días. 2da vez 90 días. 3ra vez anulación del permiso de operación.',
                'amount' => $uit * 0.05,
            ],

            [
                'target' => 'asociación',
                'code' => 'PJ-9',
                'description' => 'No tener la demarcación del paradero y la exhibición del rótulo de identificación.',
                'type' => 'Muy Grave',
                'sanction_percentage' => 5,
                'complementary_measure' => null,
                'amount' => $uit * 0.05,
            ],

            [
                'target' => 'asociación',
                'code' => 'PJ-10',
                'description' => 'Permitir que los vehículos de la flota no mantengan las características originales.',
                'type' => 'Grave',
                'sanction_percentage' => 3,
                'complementary_measure' => null,
                'amount' => $uit * 0.03,
            ],

            [
                'target' => 'asociación',
                'code' => 'PJ-11',
                'description' => 'Permitir que los vehículos realicen el servicio con distintivos diferentes a los establecidos en el Reglamento.',
                'type' => 'Grave',
                'sanction_percentage' => 3,
                'complementary_measure' => null,
                'amount' => $uit * 0.03,
            ],

            [
                'target' => 'asociación',
                'code' => 'PJ-12',
                'description' => 'Permitir que los vehículos usen equipos de sonido superando los decibeles permitidos.',
                'type' => 'Leve',
                'sanction_percentage' => 2,
                'complementary_measure' => null,
                'amount' => $uit * 0.02,
            ],
        ];


        Infraction::insert($infractionAsociation);


        $infractionDrivers = [

            [
                'target' => 'conductores',
                'code' => 'C-1',
                'description' => 'Prestar el servicio en un vehículo no habilitado.',
                'type' => 'Muy Grave',
                'sanction_percentage' => 5,
                'complementary_measure' => 'Internamiento del vehículo por 15 días calendario.',
                'amount' => $uit * 0.05,
            ],

            [
                'target' => 'conductores',
                'code' => 'C-2',
                'description' => 'Utilizar el espacio de un paradero para el cual no ha sido autorizado.',
                'type' => 'Muy Grave',
                'sanction_percentage' => 5,
                'complementary_measure' => 'Internamiento del vehículo hasta la cancelación de la sanción.',
                'amount' => $uit * 0.05,
            ],

            [
                'target' => 'conductores',
                'code' => 'C-3',
                'description' => 'Estacionarse en zonas prohibidas: paraderos informales, cruceros peatonales y zonas rígidas.',
                'type' => 'Muy Grave',
                'sanction_percentage' => 5,
                'complementary_measure' => 'Internamiento del vehículo hasta la cancelación de la sanción.',
                'amount' => $uit * 0.05,
            ],

            [
                'target' => 'conductores',
                'code' => 'C-4',
                'description' => 'Tratar a los pasajeros de forma descortés o agredirlos verbalmente (debidamente comprobado).',
                'type' => 'Grave',
                'sanction_percentage' => 3,
                'complementary_measure' => 'Retención de la licencia de conducir hasta la cancelación de la multa.',
                'amount' => $uit * 0.03,
            ],

            [
                'target' => 'conductores',
                'code' => 'C-5',
                'description' => 'No portar la Tarjeta de Circulación Vehicular.',
                'type' => 'Grave',
                'sanction_percentage' => 3,
                'complementary_measure' => null,
                'amount' => $uit * 0.03,
            ],

            [
                'target' => 'conductores',
                'code' => 'C-6',
                'description' => 'Conducir con audífonos y/o celulares atentando contra la seguridad e integridad del pasajero.',
                'type' => 'Grave',
                'sanction_percentage' => 3,
                'complementary_measure' => 'Reincidente: se aplicará el doble de la multa.',
                'amount' => $uit * 0.03,
            ],

            [
                'target' => 'conductores',
                'code' => 'C-7',
                'description' => 'Tener el vehículo sucio o en mal estado de conservación.',
                'type' => 'Leve',
                'sanction_percentage' => 2,
                'complementary_measure' => null,
                'amount' => $uit * 0.02,
            ],

            [
                'target' => 'conductores',
                'code' => 'C-8',
                'description' => 'Fumar, ingerir alimentos o bebidas mientras presta el servicio.',
                'type' => 'Leve',
                'sanction_percentage' => 2,
                'complementary_measure' => 'Internamiento del vehículo hasta la cancelación de la sanción.',
                'amount' => $uit * 0.02,
            ],

            [
                'target' => 'conductores',
                'code' => 'C-9',
                'description' => 'Permitir que los vehículos usen equipos de sonido superando los decibeles permitidos.',
                'type' => 'Leve',
                'sanction_percentage' => 2,
                'complementary_measure' => 'Internamiento del vehículo por 15 días calendario.',
                'amount' => $uit * 0.02,
            ],

            [
                'target' => 'conductores',
                'code' => 'C-10',
                'description' => 'Negarse a presentar la documentación del servicio a inspectores de Transportes y/o PNP.',
                'type' => 'Leve',
                'sanction_percentage' => 2,
                'complementary_measure' => 'Internamiento del vehículo por 15 días calendario.',
                'amount' => $uit * 0.02,
            ],

            [
                'target' => 'conductores',
                'code' => 'C-11',
                'description' => 'Prestar el servicio con vestimenta inapropiada (pantalones cortos, sayonaras, descalzo, bividi, polo sin mangas).',
                'type' => 'Leve',
                'sanction_percentage' => 2,
                'complementary_measure' => 'Reincidente: se aplicará el doble de la multa.',
                'amount' => $uit * 0.02,
            ],

            [
                'target' => 'conductores',
                'code' => 'C-12',
                'description' => 'Prestar el servicio con distintivo diferente al establecido por el reglamento.',
                'type' => 'Leve',
                'sanction_percentage' => 2,
                'complementary_measure' => null,
                'amount' => $uit * 0.02,
            ],
        ];


        Infraction::insert($infractionDrivers);
    }
}
