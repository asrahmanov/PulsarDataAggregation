<?php

namespace Database\Seeders;

use App\Models\Defect;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function import($filename, $year, $company_id)
    {

        ini_set('memory_limit', '4096M');
        ini_set('max_execution_time', 0);

        Defect::where('year', $year)
            ->where('company_id', $company_id)
            ->delete();

        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(false);
//
//
//
        $spreadsheet = $reader->load($filename);
//

        $namesSheet = $spreadsheet->getSheetNames();
        var_dump($namesSheet);

        for ($i = 0; $i < count($namesSheet); $i++) {

//        //-1 что бы обрезать итого
            $spreadsheet->setActiveSheetIndex($i);
            $num_rows = $spreadsheet->getActiveSheet()->getHighestRow();


            $dataArray = $spreadsheet->getActiveSheet()
                ->rangeToArray(
                    "A6:BD$num_rows",     // The worksheet range that we want to retrieve
                    '',        // Value that should be returned for empty cells
                    true,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                    true,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                    true         // Should the array be indexed by cell row and cell column
                );


            $event = '';
            $name_product = '';
            $date = '';
            $cover_sheet_number = '';

            foreach ($dataArray as $key => $item) {
                $insertArray = [];

                // на случай объеденнеие ячеек проставляем прошлое значение
                // номер
                if ($item['A'] == '' and $event != '') {

                } else {
                    $event = $item['A'];
                }

                if (!is_numeric($event)) {
                    continue;
                }


                if ($item['B'] == '' and $name_product != '') {

                } else {
                    $name_product = $item['B'];
                }

                if ($item['C'] == '' and $date != '') {

                } else {
                    $date = $item['C'];
                }

                if ($item['D'] == '' and $cover_sheet_number != '') {

                } else {
                    $cover_sheet_number = $item['D'];
                }

                $date_format = explode('/', $date);

                if (!isset($date[2])) {
                    continue;
                }

                $date_otk = "{$date_format[2]}-{$date_format[0]}-{$date_format[1]}";

                $product_drawing = $item['E'];
                $name_operation = $item['F'];
                $code_operation = $item['G'];
                $quantity_operation = $item['H'];
                $au_per = $item['I'];

                if ($au_per == '') {
                    continue;
                }


                $quantity_effective = $item['P'];
                $quantity_fail = $item['Q'];
                $output_percentage_norm = $item['R'];

                if($output_percentage_norm == ''){
                    $output_percentage_norm = 0;
                }


                $output_percentage_fact = $item['S'];

                if ($output_percentage_fact == '#DIV/0!') {
                    continue;
                }

                $tnb = $item['T'];
                $other_defect = $item['U'];
                $date_defect = $item['V'];


                if ($date_defect != '') {
                    $date__defect_format = explode('/', $date_defect);
                    $date_defect = "{$date__defect_format[2]}-{$date__defect_format[0]}-{$date__defect_format[1]}";
                } else {
                    $date_defect = '1970-01-01';
                }


                $regulatory_cost_rejected_product = $item['W'];
                if (stristr($regulatory_cost_rejected_product, '.') and stristr($regulatory_cost_rejected_product, ',')) {
                    $regulatory_cost_rejected_product = str_replace(',', '', $regulatory_cost_rejected_product); //Меняем точку на запятую
                }

                if ($regulatory_cost_rejected_product == '') {
                    $regulatory_cost_rejected_product = 0;
                }

                $amount_defect_plan = $item['X'];
                if (stristr($amount_defect_plan, '.') and stristr($amount_defect_plan, ',')) {
                    $amount_defect_plan = str_replace(',', '', $amount_defect_plan); //Меняем точку на запятую
                }

                if ($amount_defect_plan == '') {
                    $amount_defect_plan = 0;
                }

                $amount_defect_fact = $item['Y'];
                if (stristr($amount_defect_fact, '.') and stristr($amount_defect_fact, ',')) {
                    $amount_defect_fact = str_replace(',', '', $amount_defect_fact); //Меняем точку на запятую
                }

                if ($amount_defect_fact == '') {
                    $amount_defect_fact = 0;
                }


                $code_sto = $item['AX'];
                $name_defect = $item['AY'];
                $affiliation_defect = $item['AZ'];
                $sing_defect = $item['BA'];
                $unit_detection_defect = $item['BB'];
                $cause_defect = $item['BC'];
                $name_culprit_defect = $item['BD'];


                $insertArray[] = [
                    "name" => $namesSheet[$i],
                    "event" => $event,
                    "name_product" => $name_product,
                    "date_otk" => $date_otk,
                    'cover_sheet_number' => $cover_sheet_number,
                    'product_drawing' => $product_drawing,
                    'name_operation' => $name_operation,
                    'code_operation' => $code_operation,
                    'quantity_operation' => $quantity_operation,
                    'au_per' => $au_per,
                    'quantity_effective' => $quantity_effective,
                    'quantity_fail' => $quantity_fail,
                    'output_percentage_norm' => $output_percentage_norm,
                    'output_percentage_fact' => $output_percentage_fact,
                    'tnb' => $tnb,
                    'other_defect' => $other_defect,
                    'date_defect' => $date_defect,
                    'regulatory_cost_rejected_product' => $regulatory_cost_rejected_product,
                    'amount_defect_plan' => $amount_defect_plan,
                    'amount_defect_fact' => $amount_defect_fact,
                    'code_sto' => $code_sto,
                    'name_defect' => $name_defect,
                    'affiliation_defect' => $affiliation_defect,
                    'sing_defect' => $sing_defect,
                    'unit_detection_defect' => $unit_detection_defect,
                    'cause_defect' => $cause_defect,
                    'name_culprit_defect' => $name_culprit_defect,
                    'year' => $year,
                    'company_id' => $company_id
                ];

                var_dump($insertArray);

                \DB::table('defect')->insert($insertArray);
            }
        }

    }


    public function run()
    {

        $filename_2021 = storage_path('app/defect/defect.xlsx');

        if (file_exists($filename_2021)) {
            echo "Файл {$filename_2021}  ЕСТЬ " . PHP_EOL;
        } else {
            echo "Файл {$filename_2021} не найден " . PHP_EOL;
        }


    }
}
