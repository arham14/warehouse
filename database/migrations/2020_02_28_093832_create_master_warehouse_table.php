<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Master_Warehouse', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode', 100)->unique();
            $table->string('nama_gudang');
            $table->string('alamat_gudang')->nullable();
            $table->string('status', 100);
            $table->boolean('display');
            $table->string('penanggung_jawab');
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
        Schema::dropIfExists('Master_Warehouse');
    }
}
