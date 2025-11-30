<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('education_records', function (Blueprint $table) {
            $table->id();

            // DATOS GENERALES
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('location')->nullable();

            $table->foreignId('transport_association_id')->nullable()->constrained();

            // DATOS DEL CONDUCTOR
            $table->string('driver_id')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('driver_address')->nullable();
            $table->string('driver_document_number')->nullable(); // DNI

            // LICENCIA
            $table->string('license_class')->nullable();
            $table->string('license_number')->nullable();

            // VEHÍCULO
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles');
            $table->string('vehicle_plate')->nullable();
            $table->string('engine_number')->nullable();
            $table->string('vehicle_class')->nullable();
            $table->string('vehicle_brand')->nullable();
            $table->string('vehicle_registration_number')->nullable(); // tarjeta
            $table->string('vehicle_color')->nullable();
            $table->string('registration_date')->nullable();

            // PROPIETARIO
            $table->foreignId('partner_id')->nullable()->constrained('partners');
            $table->string('partner_name')->nullable();
            $table->string('partner_address')->nullable();
            $table->string('partner_document_number')->nullable();

            // INFRACCIÓN
            $table->boolean('law_27181')->default(false);
            $table->boolean('law_27189')->default(false);
            $table->boolean('ds_017_09_mtc')->default(false)->comment('Ley DS 017-09-MTC');
            $table->boolean('ds_055_10_mtc')->default(false)->comment('Ley DS 055-10-MTC');



            $table->string('om_number_1')->nullable();
            $table->string('om_number_2')->nullable();

            // INFORMACIÓN ADICIONAL
            $table->text('additional_information')->nullable();
            $table->text('driver_observations')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_records');
    }
};
