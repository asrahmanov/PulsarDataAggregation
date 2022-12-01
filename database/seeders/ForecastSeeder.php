<?php

namespace Database\Seeders;

use App\Models\Forecast;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ForecastSeeder extends Seeder
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

        Forecast::where('year', $year)
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
            $code = $item['D'];

            if($code == '') {
                continue;
            }
            if($company_name == 'Подразделение') {
                continue;
            }



            if($code == '00-000011') {
                $short_name = 'НО № 10';
            }

            if($code == '00-000004') {
                $short_name = 'НО № 4';
            }

            if($code == '00-000005') {
                $short_name = 'НО № 5 - ИЦ';
            }

            if($code == '00-000007') {
                $short_name = 'НО № 7';
            }

            if($code == '00-000008') {
                $short_name = 'НО № 8';
            }

            if($code == '00-000009') {
                $short_name = 'НО № 9';
            }

            if($code == '00-000002') {
                $short_name = 'Прочие'; //  Метрологический отдел
            }

            if($code == '00-000001') {
                $short_name = 'Прочие'; // Научное отделение сопровождения НИОКР и информационных систем (НО СНИОКР и ИС)
            }

            if($code == '00-000051') {
                $short_name = 'Прочие'; // Отдел капитального строительства (ОКС)
            }

            if($code == '00-000000') {
                $short_name = 'ГЗ Пульсар';
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

            var_dump($insertArray);




            $result = \DB::table('forecast')->insert($insertArray);

        }




    }


    public function run()
    {



//        $filename_2021 = storage_path('app/forecast/17/2021/Форма по прогнозу.xlsx');
//        $filename_2022 = storage_path('app/forecast/17/2022/Форма по прогнозу.xlsx');
//        $filename_2023 = storage_path('app/forecast/17/2023/Форма по прогнозу.xlsx');
//
//        if (file_exists($filename_2021)) {
//            $this->import($filename_2021, 2021, 17);
//        } else {
//            echo "Файл {$filename_2021} не найден " . PHP_EOL;
//        }
//
//        if (file_exists($filename_2022)) {
//            $this->import($filename_2022, 2022, 17);
//        } else {
//            echo "Файл {$filename_2022} не найден " . PHP_EOL;
//        }
//
//        if (file_exists($filename_2023)) {
//            $this->import($filename_2023, 2023, 17);
//        } else {
//            echo "Файл {$filename_2023} не найден " . PHP_EOL;
//        }



//        $filename_2021 = storage_path('app/forecast/36/2021/Форма по прогнозу.xlsx');
        $filename_2022 = storage_path('app/forecast/36/2022/forecast.xlsx');
//        $filename_2023 = storage_path('app/forecast/36/2023/Форма по прогнозу.xlsx');

//        if (file_exists($filename_2021)) {
//            $this->import($filename_2021, 2021, 36);
//        } else {
//            echo "Файл {$filename_2021} не найден " . PHP_EOL;
//        }

        if (file_exists($filename_2022)) {
            $this->import($filename_2022, 2022, 36);
        } else {
            echo "Файл {$filename_2022} не найден " . PHP_EOL;
        }

//        if (file_exists($filename_2023)) {
//            $this->import($filename_2023, 2023, 36);
//        } else {
//            echo "Файл {$filename_2023} не найден " . PHP_EOL;
//        }


    }
}
