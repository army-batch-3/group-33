<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_benefits', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('sss');
            $table->string('philhealth');
            $table->string('pagibig');
            $table->string('savings');
            $table->string('tin');
            $table->timestamp('date_created')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pa_benefits');
    }
}
