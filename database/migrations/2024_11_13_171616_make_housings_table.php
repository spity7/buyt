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
        Schema::create('housings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_code')->default('+961');
            $table->string('phone');
            $table->string('type');
            $table->text('title');
            $table->integer('nb_rooms');
            $table->string('area');
            $table->string('governorate');
            $table->string('furnishing_status');
            $table->string('service_type');
            $table->integer('price')->nullable();
            $table->text('description');
            $table->string('pending')->default('pending');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('city_id')->constrained('cities');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('housings');
    }
};
