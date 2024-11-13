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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('pCode', 10)->nullable();
            $table->string('governorateId', 2)->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            $table->string('name', 255)->nullable();
            $table->string('nameAr', 255)->nullable();
            $table->decimal('latitude', 9, 5)->nullable();
            $table->decimal('longitude', 10, 5)->nullable();
            $table->integer('elevation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
