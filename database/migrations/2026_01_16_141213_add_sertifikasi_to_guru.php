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
    Schema::table('gurus', function ($table) {
        $table->enum('status_sertifikasi', ['sudah','belum'])
              ->default('belum')
              ->after('telepon');
    });
}

public function down()
{
    Schema::table('gurus', function ($table) {
        $table->dropColumn('status_sertifikasi');
    });
}

};
