<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaRestockItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_restock_items', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');

            $table->unsignedBigInteger('restock_id');
            $table->unsignedBigInteger('assets_id');

            $table->foreign('restock_id')->references('id')->on('pa_restock_requests');
            $table->foreign('assets_id')->references('id')->on('pa_assets');
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
        Schema::dropIfExists('pa_restock_items');
    }
}
