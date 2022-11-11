<?php

namespace Database\Seeders;

use App\Models\ExpectedRevenue;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExpectedRevenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function import($filename, $year, $company_id){

        ini_set('memory_limit', '4096M');
        ini_set('max_execution_time', 0);
        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);

        ExpectedRevenue::where('year', $year)
        ->where('company_id', $company_id)
            ->forceDelete();

        $spreadsheet = $reader->load($filename);

        //-1 что бы обрезать итого
        $num_rows = $spreadsheet->getActiveSheet()->getHighestRow();

        $dataArray = $spreadsheet->getActiveSheet()
            ->rangeToArray(
                "B2:F$num_rows",     // The worksheet range that we want to retrieve
                '',        // Value that should be returned for empty cells
                true,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                true,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                true         // Should the array be indexed by cell row and cell column
            );


        foreach ($dataArray as $key => $item){

            $insertArray =[];
            $company_name = $item['B'];
            $short_name = $item['C'];
            $kod = $item['D'];

            if($kod == '00-000001' OR $kod == '00-000051' OR $kod == '00-000002') {
                $short_name = 'Прочие';
                $company_name = 'Прочие';
            }



            if($company_name == ''){
                continue;
            }


            $mount = $item['E'];
            $sum = $item['F'];

            if($sum == '') {
                $sum = 0;
            }

            $insertArray[] = [
                "company_name"=> $company_name,
                "short_name"=> $short_name,
                "mount"=> $mount,
                "year"=> $year,
                "company_id"=> $company_id,
                "sum"=> $sum
            ];




            $result = \DB::table('expected_revenue')->insert($insertArray);

        }




    }


    public function run()
    {



        $filename_2021 = storage_path('app/exp/17/2021/Форма по ожидаемой выручке.xlsx');
        $filename_2022 = storage_path('app/exp/17/2022/Форма по ожидаемой выручке.xlsx');
        $filename_2023 = storage_path('app/exp/17/2023/Форма по ожидаемой выручке.xlsx');

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



        $filename_2021 = storage_path('app/exp/36/2021/Форма по ожидаемой выручке.xlsx');
        $filename_2022 = storage_path('app/exp/36/2022/Форма по ожидаемой выручке.xlsx');
        $filename_2023 = storage_path('app/exp/36/2023/Форма по ожидаемой выручке.xlsx');

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
