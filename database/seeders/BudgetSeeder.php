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

    public function import($filename, $year, $company_id)
    {

        ini_set('memory_limit', '4096M');
        ini_set('max_execution_time', 0);

        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);




        Budget::where('year', $year)
            ->where('company_id', $company_id)
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



        foreach ($dataArray as $key => $item) {
            $insertArray = [];

            $sum = $item['A'];
            $date = $item['B'];

            $date = explode('.', $date);
            $date_budget = "{$date[2]}-{$date[1]}-{$date[0]}";

            $insertArray[] = [
                "date_budget" => $date_budget,
                "sum" => $sum,
                'company_id' => $company_id,
                'year' => $year
            ];

            \DB::table('budget')->insert($insertArray);
        }


    }


    public function run()
    {


        $filename_2021 = storage_path('app/budget/17/2021/Бюджет.xlsx');
        $filename_2022 = storage_path('app/budget/17/2022/Бюджет.xlsx');
        $filename_2023 = storage_path('app/budget/17/2023/Бюджет.xlsx');

        if (file_exists($filename_2021)) {
            $this->import($filename_2021, 2021, 17);
        } else {
            echo "Файл {$filename_2021} не найден " . PHP_EOL;
        }

        if (file_exists($filename_2022)) {
            $this->import($filename_2022, 2022, 17);
        } else {
            echo "Файл {$filename_2022} не найден " . PHP_EOL;
        }

        if (file_exists($filename_2023)) {
            $this->import($filename_2023, 2023, 17);
        } else {
            echo "Файл {$filename_2023} не найден " . PHP_EOL;
        }


        $filename_2021 = storage_path('app/budget/36/2021/Бюджет.xlsx');
        $filename_2022 = storage_path('app/budget/36/2022/Бюджет.xlsx');
        $filename_2023 = storage_path('app/budget/36/2023/Бюджет.xlsx');

        if (file_exists($filename_2021)) {
            $this->import($filename_2021, 2021, 36);
        } else {
            echo "Файл {$filename_2021} не найден " . PHP_EOL;
        }

        if (file_exists($filename_2022)) {
            $this->import($filename_2022, 2022, 36);
        } else {
            echo "Файл {$filename_2022} не найден " . PHP_EOL;
        }

        if (file_exists($filename_2023)) {
            $this->import($filename_2023, 2023, 36);
        } else {
            echo "Файл {$filename_2023} не найден " . PHP_EOL;
        }


    }
}
