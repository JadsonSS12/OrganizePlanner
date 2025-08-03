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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->dateTime('day');
            $table->enum('status', ['NaoIniciada', 'Sucesso', 'SemSucesso', 'ParcialmenteAtingida']); 
            $table->enum('begin', ['MORNING', 'AFTERNOON', 'EVENING']); 
            $table->enum('end', ['MORNING', 'AFTERNOON', 'EVENING']);  
            $table->enum('durationbloc', ['MeiaHora', 'UmaHora', 'Manha', 'Tarde', 'Noite', 'DiaTodo']);
            $table->json('turnos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
