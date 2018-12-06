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
            $table->unsignedInteger('ecole_id')->nullable();
            $table->string('publication_name');
            $table->enum('publication_type', ['note_de_service', 'communique', 'emplois_du_temps', 'resultats_examin', 'other']);
            $table->text('publication_description')->nullable();
            $table->string('publication_file_path')->nullable();
            $table->enum('publication_target', ['internal', 'external'])->nullable();
            $table->date('publication_date')->nullable();
            $table->date('publication_expiry_date')->nullable();
            $table->enum('publication_status', ['active', 'expired'])->default('active');
            $table->softDeletes();
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
