<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestockItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restock_items', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');

            $table->unsignedBigInteger('restock_id');
            $table->unsignedBigInteger('assets_id');

            $table->foreign('restock_id')->references('id')->on('restock_requests');
            $table->foreign('assets_id')->references('id')->on('assets');
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
        Schema::dropIfExists('restock_items');
    }
}
