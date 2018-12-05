<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('facultes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('faculte_name');
            $table->unsignedInteger('ecole_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('facultes');
    }
}
