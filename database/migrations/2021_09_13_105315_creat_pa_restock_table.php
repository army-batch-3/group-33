<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatPaRestockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_restock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('transportation_id');
            $table->unsignedBigInteger('assets_id');
            $table->integer('quantity');
            $table->enum('status', [
                'Pending',
                'Approved',
                'Shipped',
                'Dropped Off',
                'Received',
                'Closed'
            ]);

            $table->foreign('supplier_id')->references('id')->on('pa_suppliers');
            $table->foreign('warehouse_id')->references('id')->on('pa_warehouses');
            $table->foreign('transportation_id')->references('id')->on('pa_transportations');
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
        //
    }
}
