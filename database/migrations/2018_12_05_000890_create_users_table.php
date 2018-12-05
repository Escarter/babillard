<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->unsignedInteger('ecole_id')->nullable();
            $table->unsignedInteger('faculte_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('niveau_id')->nullable();
            $table->unsignedInteger('filiere_id')->nullable();
            $table->enum('user_type', ['internal', 'external'])->default('external');
            $table->string('user_matricule')->nullable();
            $table->string('user_phone')->nullable();
            $table->date('user_dob')->nullable();
            $table->string('user_place_of_birth')->nullable();
            $table->date('user_lod')->nullable();
            $table->string('user_description')->nullable();
            $table->string('user_avatar')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('first_login')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
