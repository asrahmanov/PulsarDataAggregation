<?php

namespace Database\Seeders;

use App\Models\FinancialIndicators;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class FinancialIndicatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function import($filename, $year, $company_id)
    {

        FinancialIndicators::where('company_id',$company_id)
            ->where('year', $year)
            ->forceDelete();


        ini_set('memory_limit', '4096M');
        ini_set('max_execution_time', 0);
        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);

        $spreadsheet = $reader->load($filename);

        //-1 что бы обрезать итого
        $num_rows = $spreadsheet->getActiveSheet()->getHighestRow();

        $dataArray = $spreadsheet->getActiveSheet()
            ->rangeToArray(
                "A2:G$num_rows",     // The worksheet range that we want to retrieve
                '',        // Value that should be returned for empty cells
                false,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                true,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                true         // Should the array be indexed by cell row and cell column
            );


        foreach ($dataArray as $key => $item) {
            $insertArray = [];

            $mount = $item['A'];
            $year = $item['B'];
            $budget = $item['C'];
            $fact = $item['D'];
            $forecast = $item['E'];
            $last_year = $item['F'];
            $type = $item['G'];

            $insertArray[] = [
                "mount" => $mount,
                "year" => $year,
                "budget" => $budget,
                "fact" => $fact,
                "forecast" => $forecast,
                "last_year" => $last_year,
                "type" => $type,
                "company_id" => $company_id
            ];
            \DB::table('financial_indicators')->insert($insertArray);
        }


    }


    public function run()
    {


        $filename_2022 = storage_path('app/FinancialIndicators/17/2022/financial_indicators.xlsx');
//        $filename_2023 = storage_path('app/FinancialIndicators/17/2023/financial_indicators.xlsx');



        if (file_exists($filename_2022)) {
            $this->import($filename_2022, 2022, 17);
        } else {
            echo "Файл {$filename_2022} не найден " . PHP_EOL;
        }

//        if (file_exists($filename_2023)) {
//            $this->import($filename_2023, 2023, 17);
//        } else {
//            echo "Файл {$filename_2023} не найден " . PHP_EOL;
//        }







    }
}
