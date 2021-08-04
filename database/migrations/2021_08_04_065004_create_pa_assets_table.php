<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->integer('number_of_stocks');
            $table->string('type');
            $table->double('price');

            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('warehouse_id');

            $table->foreign('supplier_id')->references('id')->on('pa_suppliers');
            $table->foreign('warehouse_id')->references('id')->on('pa_warehouses');
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
        Schema::dropIfExists('pa_assets');
    }
}
