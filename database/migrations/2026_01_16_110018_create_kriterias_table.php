<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('kriterias', function (Blueprint $table) {

        $table->id();

        $table->string('kode');       // C1, C2
        $table->string('nama');       // Pedagogik
        $table->decimal('bobot',5,2); // 0.30
        $table->enum('tipe',['benefit','cost']);

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriterias');
    }
};
