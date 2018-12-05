<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('partenaire_id');
            $table->string('stage_lieux')->nullable();
            $table->string('stage_description')->nullable();
            $table->string('stage_period')->nullable();
            $table->date('stage_debut')->nullable();
            $table->date('stage_fin')->nullable();
            $table->date('stage_expiry_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('stages');
    }
}
