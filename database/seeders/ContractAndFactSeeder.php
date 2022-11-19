<?php

namespace Database\Seeders;

use App\Models\ContractAndFact;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ContractAndFactSeeder extends Seeder
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


        ContractAndFact::where('year', $year)
            ->where('company_id', $company_id)
            ->delete();

        $spreadsheet = $reader->load($filename);

        //-1 что бы обрезать итого
        $num_rows = $spreadsheet->getActiveSheet()->getHighestRow();

        $dataArray = $spreadsheet->getActiveSheet()
            ->rangeToArray(
                "A11:AG$num_rows",     // The worksheet range that we want to retrieve
                '',        // Value that should be returned for empty cells
                false,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                true,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                true         // Should the array be indexed by cell row and cell column
            );



        foreach ($dataArray as $key => $item) {
            $insertArray = [];

            $company_name = $item['A'];
            if($company_name == 'Итого') {
                break;
            }

            $code = $item['F'];
            $short_name = '';

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


            $plan_1 = $item['I'];
            $fact_1 = $item['J'];

            $plan_2 = $item['K'];
            $fact_2 = $item['L'];

            $plan_3 = $item['M'];
            $fact_3 = $item['N'];

            $plan_4 = $item['O'];
            $fact_4 = $item['P'];

            $plan_5 = $item['Q'];
            $fact_5 = $item['R'];

            $plan_6 = $item['S'];
            $fact_6 = $item['T'];

            $plan_7 = $item['U'];
            $fact_7 = $item['V'];

            $plan_8 = $item['W'];
            $fact_8 = $item['X'];

            $plan_9 = $item['Y'];
            $fact_9 = $item['Z'];

            $plan_10 = $item['AA'];
            $fact_10 = $item['AB'];

            $plan_11 = $item['AC'];
            $fact_11 = $item['AD'];

            $plan_12 = $item['AE'];
            $fact_12 = $item['AF'];
            $ob = $item['AG'];




            $insertArray[] = [
                "company_name" => $company_name,
                "short_name" => $short_name,
                "company_id" => $company_id,
                'year' => $year,

                'plan_1' => $plan_1,
                'plan_2' => $plan_2,
                'plan_3' => $plan_3,
                'plan_4' => $plan_4,
                'plan_5' => $plan_5,
                'plan_6' => $plan_6,
                'plan_7' => $plan_7,
                'plan_8' => $plan_8,
                'plan_9' => $plan_9,
                'plan_10' => $plan_10,
                'plan_11' => $plan_11,
                'plan_12' => $plan_12,

                'fact_1' => $fact_1,
                'fact_2' => $fact_2,
                'fact_3' => $fact_3,
                'fact_4' => $fact_4,
                'fact_5' => $fact_5,
                'fact_6' => $fact_6,
                'fact_7' => $fact_7,
                'fact_8' => $fact_8,
                'fact_9' => $fact_9,
                'fact_10' => $fact_10,
                'fact_11' => $fact_11,
                'fact_12' => $fact_12,
                'ob' => $ob,

            ];
            \DB::table('contract_and_fact')->insert($insertArray);
        }


    }


    public function run()
    {


        $filename_2021 = storage_path('app/contractAndFact/17/2021/Контрактация и факт.xlsx');
        $filename_2022 = storage_path('app/contractAndFact/17/2022/Контрактация и факт.xlsx');
        $filename_2023 = storage_path('app/contractAndFact/17/2023/Контрактация и факт.xlsx');

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


        $filename_2021 = storage_path('app/contractAndFact/36/2021/Контрактация и факт.xlsx');
        $filename_2022 = storage_path('app/contractAndFact/36/2022/Контрактация и факт.xlsx');
        $filename_2023 = storage_path('app/contractAndFact/36/2023/Контрактация и факт.xlsx');

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
