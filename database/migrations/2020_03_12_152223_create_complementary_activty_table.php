<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplementaryActivtyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complementaryActivty', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->date('date');
            $table->string('place');
            $table->string('theme');
            $table->bigInteger('userId');
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
        Schema::dropIfExists('complementary_activty');
    }
}
