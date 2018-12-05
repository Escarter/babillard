<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemoiresTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('memoires', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('memoire_theme');
            $table->integer('memoire_note');
            $table->text('memoire_description')->nullable();
            $table->enum('memoire_status', ['pending', 'publish'])->default('pending');
            $table->date('memoire_publication_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('memoires');
    }
}
