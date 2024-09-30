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
        Schema::create('anti_spans', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('mac')->nullable();
            $table->integer('intentos')->default(0);
            $table->string('navegador')->nullable();
            $table->boolean('es_bloq')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anti_spans');
    }
};
