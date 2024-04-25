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
        Schema::create('perkuliahan', function (Blueprint $table) {
            $table->increments('id_perkuliahan');
            $table->string('nim', 10)->nullable();
            $table->string('kode_mk', 10)->nullable();
            $table->double('nilai')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
