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
        Schema::create('ordonnances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('medicament_id')->nullable();
            $table->bigInteger('consultation_id')->nullable();
            $table->bigInteger('patient_id')->nullable();
            $table->bigInteger('medecin_id')->nullable();  
            $table->string('quantite')->nullable();
            $table->string('dose')->nullable();
            $table->string('frequence_admin')->nullable();
            $table->string('duree')->nullable();
            $table->string('status')->default('NON');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordonnances');
    }
};
