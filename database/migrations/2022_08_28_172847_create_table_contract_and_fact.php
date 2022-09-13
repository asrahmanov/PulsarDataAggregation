<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableContractAndFact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_and_fact', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('short_name');
            $table->integer('company_id');
            $table->integer('year');
            $table->DOUBLE('fact_1')->unsigned()->default(0);
            $table->DOUBLE('plan_1')->unsigned()->default(0);
            $table->DOUBLE('fact_2')->unsigned()->default(0);
            $table->DOUBLE('plan_2')->unsigned()->default(0);
            $table->DOUBLE('fact_3')->unsigned()->default(0);
            $table->DOUBLE('plan_3')->unsigned()->default(0);
            $table->DOUBLE('fact_4')->unsigned()->default(0);
            $table->DOUBLE('plan_4')->unsigned()->default(0);
            $table->DOUBLE('fact_5')->unsigned()->default(0);
            $table->DOUBLE('plan_5')->unsigned()->default(0);
            $table->DOUBLE('fact_6')->unsigned()->default(0);
            $table->DOUBLE('plan_6')->unsigned()->default(0);
            $table->DOUBLE('fact_7')->unsigned()->default(0);
            $table->DOUBLE('plan_7')->unsigned()->default(0);
            $table->DOUBLE('fact_8')->unsigned()->default(0);
            $table->DOUBLE('plan_8')->unsigned()->default(0);
            $table->DOUBLE('fact_9')->unsigned()->default(0);
            $table->DOUBLE('plan_9')->unsigned()->default(0);
            $table->DOUBLE('fact_10')->unsigned()->default(0);
            $table->DOUBLE('plan_10')->unsigned()->default(0);
            $table->DOUBLE('fact_11')->unsigned()->default(0);
            $table->DOUBLE('plan_11')->unsigned()->default(0);
            $table->DOUBLE('fact_12')->unsigned()->default(0);
            $table->DOUBLE('plan_12')->unsigned()->default(0);
            $table->DOUBLE('ob')->unsigned()->default(0);
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
        Schema::dropIfExists('contract_and_fact');
    }
}
