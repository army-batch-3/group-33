<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisition_requests', function (Blueprint $table) {
            $table->id();
            $table->enum('status', [
                'Approved',
                'Pending',
                'Declined'
            ]);
            $table->date('date_approved');

            $table->unsignedBigInteger('requestor_id');
            $table->unsignedBigInteger('approver_id');

            $table->foreign('requestor_id')->references('id')->on('employees');
            $table->foreign('approver_id')->references('id')->on('employees');
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
        Schema::dropIfExists('requisition_requests');
    }
}
