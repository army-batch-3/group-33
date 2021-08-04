<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaTransportationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_transportations', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('plate_number');

            $table->unsignedBigInteger('vehicle_id');

            $table->foreign('vehicle_id')->references('id')->on('pa_vehicles');
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
        Schema::dropIfExists('pa_transportations');
    }
}
