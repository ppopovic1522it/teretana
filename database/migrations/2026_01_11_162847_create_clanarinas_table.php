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
        Schema::create('clanarinas', function (Blueprint $table) {
        $table->id();
        $table->integer('iznos');
        $table->dateTime('datum_uplate');
        $table->integer('trajanje');
        $table->string('status'); // aktivna / uskoro ističe / istekla
        $table->foreignId('clan_id')->constrained('clans')->cascadeOnDelete();
        $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clanarinas');
    }
};
