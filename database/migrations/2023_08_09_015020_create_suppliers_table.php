<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier');
            $table->string('alamat');
            $table->string('jumlah_kain')->default(0);
            $table->string('HGT')->default(0);
            $table->string('INT')->default(0);
            $table->string('Febri')->default(0);
            $table->string('TC')->default(0);
            $table->string('Biasa')->default(0);
            $table->string('Lebar')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
