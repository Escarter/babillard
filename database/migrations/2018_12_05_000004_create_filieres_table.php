<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilieresTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('filieres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filiere_name');
            $table->unsignedInteger('niveau_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('filieres');
    }
}
