<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartenairesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('partenaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('partenaire_name');
            $table->string('partenaire_representative')->nullable();
            $table->string('partenaire_logo')->nullable();
            $table->string('partenaire_location')->nullable();
            $table->string('partenaire_email')->nullable();
            $table->string('partenaire_phone')->nullable();
            $table->string('partenaire_username')->nullable();
            $table->string('partenaire_password');
            $table->date('partenaire_lod')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('partenaires');
    }
}
