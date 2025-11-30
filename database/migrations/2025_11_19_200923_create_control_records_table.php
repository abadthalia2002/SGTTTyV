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
        Schema::create('control_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transport_association_id')->nullable()->constrained();

            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('intervention_place')->nullable();
            $table->string('name')->nullable();
            $table->text('service_mode')->nullable();

            // Datos del vehículo
            $table->foreignId('vehicle_id')->nullable()->constrained();
            $table->string('vehicle_authorization_number')->nullable(); // número de habilitación vehicular
            $table->string('vehicle_plate');

            // Ruta del servicio (al ser intervenido)
            $table->string('route_origin')->nullable();
            $table->string('route_destination')->nullable();

            // Conductor
            $table->foreignId('driver_id')->nullable()->constrained('drivers');
            $table->string('driver_name');
            $table->string('driver_license_number'); // número de licencia
            $table->string('driver_document_number'); // DNI
            $table->string('driver_license_class')->nullable();
            $table->string('driver_license_category')->nullable();

            // Infracción
            $table->foreignId('infraction_id')->nullable()->constrained('infractions');
            $table->string('infraction_code_detected')->nullable(); // código detectado
            $table->string('detected_non_compliance_code')->nullable();
            $table->string('verification_findings')->nullable(); // descripción del infracción

            // Manifestación
            $table->text('infraction_description_location')->nullable(); // descripción y ubicación del local
            $table->text('admin_statement')->nullable(); // manifestación administrativa

            $table->string('status')->nullable();
            $table->decimal('payment_amount', 10, 2)->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('control_records');
    }
};
