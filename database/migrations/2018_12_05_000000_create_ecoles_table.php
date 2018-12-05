<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEcolesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ecoles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ecole_name')->nullable();
            $table->string('ecole_type')->nullable();
            $table->string('ecole_representative')->nullable();
            $table->string('ecole_address')->nullable();
            $table->string('ecole_location')->nullable();
            $table->string('ecole_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('ecoles');
    }
}
