<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFinancialIndicators extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_indicators', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->string('mount');
            $table->string('year');
            $table->DOUBLE('budget');
            $table->DOUBLE('fact');
            $table->DOUBLE('forecast');
            $table->DOUBLE('last_year');
            $table->enum('type',['ebida','profit','net profit','revenue']);
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
        Schema::dropIfExists('financial_indicators');
    }
}
