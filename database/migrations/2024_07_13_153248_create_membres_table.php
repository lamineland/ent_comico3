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
        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->integer('telephone')->nullable();
            $table->enum('cite', ['CPI', 'Comico']); 
            $table->enum('etat', ['Actif', 'Inactif', 'Déménagé']);
            $table->string('fonction', 25)->nullable();
            $table->integer('numero_villa')->nullable();
            $table->string('detail_logement', 255)->nullable();
            $table->date('date_amenagement')->nullable();
 
            $table->foreignId('user_id');
        
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membres');
    }
};
