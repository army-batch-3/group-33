<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatPaRequisitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_requisition', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transportation_id');
            $table->unsignedBigInteger('employee_id');
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

            $table->foreign('transportation_id')->references('id')->on('pa_transportations');
            $table->foreign('employee_id')->references('id')->on('pa_employees');
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
    }
}
