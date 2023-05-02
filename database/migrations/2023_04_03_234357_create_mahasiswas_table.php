<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->integer('Nim')->primary();
            $table->string('Nama',50)->nullable();
            $table->string('Kelas',50)->nullable();
            $table->string('Jurusan',50)->nullable();
            $table->string('No_Handphone',20)->nullable();
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
        //Schema::create('penggajian', function (Blueprint $table) {
            //$table->id();
            //$table->timestamps();
        //});

        Schema::dropIfExists('penggajian');
}
};