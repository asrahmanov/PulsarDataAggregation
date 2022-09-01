<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class OperationalPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ini_set('memory_limit', '4096M');
        ini_set('max_execution_time', 0);
        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);

        $spreadsheet = $reader->load(storage_path('app/31.08.22 Оперативный план 2022.xlsx'));

        //-1 что бы обрезать итого
        $num_rows = $spreadsheet->getActiveSheet()->getHighestRow();

        $dataArray = $spreadsheet->getActiveSheet()
            ->rangeToArray(
                "A2:N$num_rows",     // The worksheet range that we want to retrieve
                '',        // Value that should be returned for empty cells
                false,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                true,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                true         // Should the array be indexed by cell row and cell column
            );


        $insertArray = [];

        foreach ($dataArray as $key => $item) {
            $short_name = $item['A'];
            $company_name = $item['B'];
            $plan_1 = $item['C'];
            $plan_2 = $item['D'];
            $plan_3 = $item['E'];
            $plan_4 = $item['F'];
            $plan_5 = $item['G'];
            $plan_6 = $item['H'];
            $plan_7 = $item['I'];
            $plan_8 = $item['J'];
            $plan_9 = $item['K'];
            $plan_10 = $item['L'];
            $plan_11 = $item['M'];
            $plan_12 = $item['N'];


            $sum = $item['C'];

            $insertArray[] = [
                "short_name" => $short_name,
                "company_name" => $company_name,
                "plan_1" => $plan_1,
                "plan_2" => $plan_2,
                "plan_3" => $plan_3,
                "plan_4" => $plan_4,
                "plan_5" => $plan_5,
                "plan_6" => $plan_6,
                "plan_7" => $plan_7,
                "plan_8" => $plan_8,
                "plan_9" => $plan_9,
                "plan_10" => $plan_10,
                "plan_11" => $plan_11,
                "plan_12" => $plan_12
            ];
        }


        \DB::table('operational_plan')->insert($insertArray);
    }
}
