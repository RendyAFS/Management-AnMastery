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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('fabrics_id')->constrained();
            // $table->foreignId('price_employees_id')->constrained();
            $table->string('nama')->nullable();
            $table->string('deskripsi', 10000)->nullable();
            $table->string('total_gaji');
            $table->timestamps();
            // $table->string('panjang_kain')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
