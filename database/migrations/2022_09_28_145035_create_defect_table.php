<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defect', function (Blueprint $table) {
            $table->id();
            $table->integer('event'); // Номер
            $table->string('mame_product'); // Наименование изделий
            $table->integer('cover_sheet_number'); // Номер сопроводительного листа
            $table->string('product_drawing'); // Обозначение чертежа полуфабриката
            $table->string('name_operation'); // Наименование операции
            $table->string('code_operation'); // Код операции
            $table->integer('quantity_operation'); // Кол-во поступивших на операцию   (шт)
            $table->DOUBLE('au_per')->unsigned()->default(0);// Au на 1000 шт
            $table->integer('quantity_effective'); // Количество годных, шт
            $table->integer('quantity_fail'); // Потери, шт
            $table->DOUBLE('output_percentage_norm')->unsigned()->default(0);// Процент выхода норма, %
            $table->DOUBLE('output_percentage_fact')->unsigned()->default(0);// Процент выхода факт, %
            $table->integer('tnb')->unsigned()->default(0);// ТНБ, шт
            $table->integer('other_defect')->unsigned()->default(0); // Прочий брак, шт.
            $table->date('date_defect'); // Дата обнаружения брака
            $table->DOUBLE('regulatory_cost_rejected_product')->unsigned()->default(0); // Нормативная себестоимость забракованной продукции (на единицу), руб
            $table->DOUBLE('amount_defect_plan')->unsigned()->default(0); // Сумма брака план, руб
            $table->DOUBLE('amount_defect_fact')->unsigned()->default(0); // Сумма брака факт, руб
            $table->string('code_sto'); // Код по СТО ПАРМ. 022
            $table->string('name_defect'); // Наименование причины брака
            $table->string('affiliation_defect'); // Принадлежность брака
            $table->string('sing_defect'); // Признак брака
            $table->string('unit_detection_defect'); // Подразделение обнаружения брака
            $table->string('cause_defect'); // Подразделение - виновник возникновения брака
            $table->string('name_culprit_defect'); // ФИО виновника брака
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
        Schema::dropIfExists('defect');
    }
}
