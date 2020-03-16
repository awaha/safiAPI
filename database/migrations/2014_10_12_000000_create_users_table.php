<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('login', 30)->unique();
            $table->date('birthdate');
            $table->string('codePostal');
            $table->string('city');
            $table->string('address');
            $table->bigInteger('userTypeId');
            $table->bigInteger('districtId')->nullable();
            $table->date('hireDate');
            $table->date('fireDate')->nullable();
            $table->boolean('isActivated');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('apiToken')->nullable();
            $table->double('notorietyCoef')->nullable();
            $table->string('complementarySpeciality')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
