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
        Schema::table('tareas', function (Blueprint $table) {
            
            $table->unsignedBigInteger('Userid'); // Relación con usuarios
            $table->string('name', 255); // Nombre de la tarea
            $table->text('description')->nullable(); // Descripción opcional
            $table->timestamps(); 
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tareas', function (Blueprint $table) {
            //
        });
    }
};
