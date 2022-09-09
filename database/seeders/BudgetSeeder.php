<?php

namespace Database\Seeders;

use App\Models\Budget;
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

        $filename = storage_path('SHARE/Данные для дашборда по выручке/АО ГЗ Пульсар/2022/Бюджет.xlsx');

        $dir    = storage_path('/SHARE');
        $files1 = scandir($dir);
        var_dump($files1);

        if (file_exists($filename)) {
            Budget::where('year','2022')
                ->where('company_id', '17')
                ->delete();

            $spreadsheet = $reader->load($filename);

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
                    "sum" => $sum,
                    'company_id' => 17,
                    'year' => $date[2]
                ];
            }


            \DB::table('budget')->insert($insertArray);
        } else {
            echo "Файл не найден";
        }

        $filename = storage_path('SHARE/Данные для дашборда по выручке/АО ГЗ Пульсар/2021/Бюджет.xlsx');

        if (file_exists($filename)) {

            Budget::where('year','2021')
                ->where('company_id', '17')
                ->delete();
            $spreadsheet = $reader->load($filename);

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
                    "sum" => $sum,
                    'company_id' => 17,
                    'year' => $date[2]
                ];
            }


            \DB::table('budget')->insert($insertArray);
        } else {
            echo "Файл не найден";
        }



        $filename = storage_path('SHARE/Данные для дашборда по выручке/АО ГЗ Пульсар/2023/Бюджет.xlsx');

        if (file_exists($filename)) {

            Budget::where('year','2023')
                ->where('company_id', '17')
                ->delete();

            $spreadsheet = $reader->load($filename);

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
                    "sum" => $sum,
                    'company_id' => 17,
                    'year' => $date[2]
                ];
            }


            \DB::table('budget')->insert($insertArray);
        } else {
            echo "Файл не найден";
        }




    }
}
