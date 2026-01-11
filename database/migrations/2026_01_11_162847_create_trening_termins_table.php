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
        Schema::create('trening_termins', function (Blueprint $table) {
        $table->id();
        $table->dateTime('datum_i_vreme');
        $table->string('tip');    
        $table->string('status'); 
        $table->foreignId('clan_id')->constrained('clans')->cascadeOnDelete();
        $table->foreignId('trener_id')->constrained('treners')->cascadeOnDelete();
        $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trening_termins');
    }
};
