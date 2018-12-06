<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->enum('publication_type', ['note_de_service', 'communique', 'emplois_du_temps', 'resultats_examin', 'other']);
            $table->text('publication_description')->nullable();
            $table->string('publication_file_path')->nullable();
            $table->enum('publication_target', ['internal', 'external'])->nullable();
            $table->unsignedInteger('ecole_id')->nullable();
            $table->unsignedInteger('faculte_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('niveau_id')->nullable();
            $table->unsignedInteger('filiere_id')->nullable();
            $table->date('publication_date')->nullable();
            $table->date('publication_expiry_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
