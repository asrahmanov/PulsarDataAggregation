<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePlanContract extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_contract', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('short_name');
            $table->integer('company_id');
            $table->integer('year');
            $table->date('date_contract_end');
            $table->DOUBLE('sum')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_contract');
    }
}
