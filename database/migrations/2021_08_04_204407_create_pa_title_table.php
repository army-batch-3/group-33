<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePaTitleTable extends Migration
{
    public function up()
    {
        Schema::create('pa_title', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->string('Description');
            $table->string('PayLevel');
            $table->integer('first_half_month');
            $table->integer('second_half_month');
            $table->integer('allowance');
            $table->integer('Daily_rate');
            $table->integer('Hourly_rate');
            $table->integer('Minute_rate');
            $table->integer('Month_rate');
            $table->string('Class');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pa_title');
    }
}
