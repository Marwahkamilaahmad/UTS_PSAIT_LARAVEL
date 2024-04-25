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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim', 10)->primary();
            $table->string('nama', 20)->nullable();
            $table->string('alamat', 40)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->timestamps(); // Kolom untuk created_at dan updated_at
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
