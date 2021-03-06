<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('floor', 20)->nullable();
            $table->string('building')->nullable();
            $table->string('room')->nullable();
            $table->longText('address');
            $table->string('section')->nullable();
            $table->string('contact_number', 12);
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
        Schema::dropIfExists('pa_warehouses');
    }
}
