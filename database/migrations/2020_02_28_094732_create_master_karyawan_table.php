<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Master_Karyawan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nip');
            $table->string('nik', 20)->nullable();
            $table->string('nama_karyawan');
            $table->string('no_hp', 20)->nullable();
            $table->string('alamat')->nullable();
            $table->string('status', 25);
            $table->string('email', 100)->nullable();
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
        Schema::dropIfExists('Master_Karyawan');
    }
}
