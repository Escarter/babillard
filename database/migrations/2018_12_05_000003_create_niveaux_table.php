<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNiveauxTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('niveaux', function (Blueprint $table) {
            $table->increments('id');
            $table->string('niveau_name');
            $table->unsignedInteger('department_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('niveaux');
    }
}
