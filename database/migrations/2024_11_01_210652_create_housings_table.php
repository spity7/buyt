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
            $table->string('phone');
            $table->string('type');
            $table->text('type_description')->nullable();
            $table->integer('nb_rooms');
            $table->string('area');
            $table->string('governorate');
            $table->string('city');
            $table->string('furnishing_status');
            $table->string('service_type');
            $table->string('price')->nullable();
            $table->text('description')->nullable();
            $table->boolean('pending')->default('1');
            $table->foreignId('user_id')->constrained();
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
