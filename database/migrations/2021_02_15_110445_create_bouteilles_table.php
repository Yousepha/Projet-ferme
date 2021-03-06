<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBouteillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bouteilles', function (Blueprint $table) {
            $table->bigIncrements('idBouteille');
            $table->unsignedBigInteger('stock_id')->nullable();
            $table->foreign('stock_id')->references('idStock')->on('stock_laits')->onUpdate('cascade')->onDelete('cascade');            
            $table->integer('capacite');
            $table->integer('prix')->nullable();
            $table->integer('nombreDispo');
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('bouteilles');
    }
}
