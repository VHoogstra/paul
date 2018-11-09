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
            $table->string('first_name')->nullable($value = true);
            $table->string('middle_name')->nullable($value = true)->default('');
            $table->string('last_name')->nullable($value = true);
            $table->string('adres')->nullable($value = true);
            $table->string('postalcode')->nullable($value = true);
            $table->string('town')->nullable($value = true);
            $table->string('class')->nullable($value = true);
            $table->string('phone_number')->nullable($value = true);
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
