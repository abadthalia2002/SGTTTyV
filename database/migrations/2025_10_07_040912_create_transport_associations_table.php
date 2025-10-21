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
        Schema::create('transport_associations', function (Blueprint $table) {
            $table->id();
            $table->string('document_number');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('location')->nullable();
            $table->foreignId('partner_id')->nullable()->constrained('partners');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transport_associations');
    }
};
