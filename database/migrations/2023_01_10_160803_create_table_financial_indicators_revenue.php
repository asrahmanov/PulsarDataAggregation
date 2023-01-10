<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFinancialIndicatorsRevenue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_financial_indicators_revenue', function (Blueprint $table) {
            $table->id();
            $table->string('mount');
            $table->string('year');
            $table->DOUBLE('budget');
            $table->DOUBLE('fact');
            $table->DOUBLE('forecast');
            $table->DOUBLE('last_year');
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
        Schema::dropIfExists('table_financial_indicators_revenue');
    }
}
