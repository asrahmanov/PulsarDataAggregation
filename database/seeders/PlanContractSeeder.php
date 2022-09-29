<?php

namespace Database\Seeders;

use App\Models\PlanContract;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PlanContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function import($filename, $year, $company_id)
    {

        PlanContract::where('company_id', $company_id)
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
                "A2:D$num_rows",     // The worksheet range that we want to retrieve
                '',        // Value that should be returned for empty cells
                false,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                true,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                true         // Should the array be indexed by cell row and cell column
            );



        foreach ($dataArray as $key => $item) {
            $insertArray = [];


            $company_name = $item['A'];
            $short_name = $item['B'];
            $date = $item['C'];
            if ($date == '') {
                $date = '31.12.2022';
            }

            if ($company_name == '') {
               continue;
            }



            $date = explode('.', $date);

            if(!isset($date[2])) {
                continue;
            }



            $date_contract_end = "{$date[2]}-{$date[1]}-{$date[0]}";
            $sum = $item['D'];

            $insertArray[] = [
                "company_name" => $company_name,
                "company_id" => $company_id,
                "year" => $year,
                "short_name" => $short_name,
                "date_contract_end" => $date_contract_end,
                "sum" => $sum
            ];

            \DB::table('plan_contract')->insert($insertArray);
        }





    }


    public function run()
    {

        $filename_2021 = storage_path('app/PlanContract/17/2021/Планируемые договоры.xlsx');
        $filename_2022 = storage_path('app/PlanContract/17/2022/Планируемые договоры.xlsx');
        $filename_2023 = storage_path('app/PlanContract/17/2023/Планируемые договоры.xlsx');

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


        $filename_2021 = storage_path('app/PlanContract/36/2021/Планируемые договоры.xlsx');
        $filename_2022 = storage_path('app/PlanContract/36/2022/Планируемые договоры.xlsx');
        $filename_2023 = storage_path('app/PlanContract/36/2023/Планируемые договоры.xlsx');

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
