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
        Schema::create('rendez_vouses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patient_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->text('motif')->nullable();
            $table->string('specialite')->nullable();
            $table->date('date')->nullable();
            $table->time('heure')->nullable();
            $table->integer('aprouvedby')->nullable();
            $table->integer('deletedby')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendez_vouses');
    }
};
