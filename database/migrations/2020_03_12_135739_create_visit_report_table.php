<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitReport', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('reason');
            $table->string('results');
            $table->bigInteger('userId');
            $table->bigInteger('practitionerId');
            $table->bigInteger('stateId');
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
        Schema::dropIfExists('visitReport');
    }
}
