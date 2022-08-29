<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class BudgetSeeder extends Seeder
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

        $spreadsheet = $reader->load(storage_path('app/25.08.22 Бюджет 2022.xlsx'));

        //-1 что бы обрезать итого
        $num_rows = $spreadsheet->getActiveSheet()->getHighestRow();

        $dataArray = $spreadsheet->getActiveSheet()
            ->rangeToArray(
                "A2:C$num_rows",     // The worksheet range that we want to retrieve
                '',        // Value that should be returned for empty cells
                false,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                true,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                true         // Should the array be indexed by cell row and cell column
            );


        $insertArray = [];

        foreach ($dataArray as $key => $item) {
            $sum = $item['A'];
            $date = $item['B'];

            $date = explode('.', $date);
            $date_budget = "{$date[2]}-{$date[1]}-{$date[0]}";

            $insertArray[] = [
                "date_budget" => $date_budget,
                "sum" => $sum
            ];
        }


        \DB::table('budget')->insert($insertArray);
    }
}