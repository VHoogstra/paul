<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('price',4,2);
            $table->double('price_preSale',4,2);
            $table->double('price_special',4,2);
            $table->timestamp('preSale_start');
            $table->timestamp('start_date')->nullable($value = true);
            $table->timestamp('stop_date')->nullable($value = true);
            $table->integer('active')->default('0');
            $table->integer('archive')->default('0');
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
        Schema::dropIfExists('parties');
    }
}
