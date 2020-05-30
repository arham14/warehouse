<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePoDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_po', 25);
            $table->string('kode_barang', 25);
            $table->decimal('qty', 10,0);
            $table->decimal('qty_in', 10,0);
            $table->decimal('adj_add', 10,0);
            $table->decimal('adj_min', 10,0);
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
        Schema::dropIfExists('po_detail');
    }
}
