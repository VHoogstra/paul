<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('stamnr')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable($value = true);
            $table->string('last_name');
            $table->string('adres');
            $table->string('postalcode');
            $table->string('town');
            $table->string('class');
            $table->string('phone_number');
            $table->date('birth_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
