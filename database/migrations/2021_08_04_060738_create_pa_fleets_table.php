<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaFleetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_fleets', function (Blueprint $table) {
            $table->id();
            $table->integer('request_id');
            $table->enum('type_of_request', [
                'Restock',
                'Requisition'
            ]);
            $table->enum('status', [
                'Delivered',
                'Picked-up',
                'Pending'
            ]);
            $table->unsignedBigInteger('driver_id');

            $table->foreign('driver_id')->references('id')->on('pa_drivers');
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
        Schema::dropIfExists('pa_fleets');
    }
}
