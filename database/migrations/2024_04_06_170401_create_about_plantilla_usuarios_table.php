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
        Schema::create('about_plantilla_usuarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plantilla_usuario_id')->constrained();
            $table->string('url_foto')->nullable();
            $table->string('nombre_completo')->nullable();
            $table->string('email')->nullable();
            $table->string('provincial')->nullable();
            $table->string('poblacion')->nullable();
            $table->string('num_contacto')->nullable();
            $table->date('nacimiento')->nullable();
            $table->boolean('dip_viajar')->nullable();
            $table->string('incorporacion')->nullable();
            $table->text('texto1')->nullable();
            $table->text('texto2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_plantilla_usuarios');
    }
};
