<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kep', function (Blueprint $table) {
            $table->id();
            $table->string('source_name');
            $table->string('pp');
            $table->string('nomenclature');
            $table->string('action');
            $table->date('date_action');
            $table->integer('val');
            $table->string('year');
            $table->integer('company_id');
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
        Schema::dropIfExists('kep');
    }
}
