<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('internment_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transport_association_id')->nullable()->constrained();
            $table->foreignId('partner_id')->nullable()->constrained();
            $table->string('partner_name')->nullable()->comment('Nombre del socio/propietario');
            $table->foreignId('driver_id')->nullable()->constrained();
            $table->string('driver_name')->nullable()->comment('Nombre del conductor');
            $table->foreignId('vehicle_id')->nullable()->constrained();

            $table->string('plate')->comment('Placa del vehículo');
            $table->string('engine_number')->nullable()->comment('Número de motor');
            $table->string('serial_number')->nullable()->comment('Número de serie');
            $table->string('model')->nullable()->comment('Modelo');
            $table->string('brand')->nullable()->comment('Marca');
            $table->string('vehicle_class')->nullable()->comment('Clase');
            $table->string('color')->nullable()->comment('Color');
            $table->string('body_type')->nullable()->comment('Carrocería');
            $table->string('manufacturing_year')->nullable()->comment('Año de fabricación');
            $table->string('pnp_ticket')->nullable()->comment('Papeleta PNP');
            $table->string('infraction_comisaria')->nullable()->comment('infracción Comisaría');
            $table->foreignId('infraction_id')->nullable()->constrained();

            $table->text('observation')->nullable()->comment('Observación');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internment_records');
    }
};
