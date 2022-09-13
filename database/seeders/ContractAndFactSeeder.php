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
                "A9:AF$num_rows",     // The worksheet range that we want to retrieve
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


            $plan_1 = $item['H'];
            $fact_1 = $item['I'];

            $plan_2 = $item['J'];
            $fact_2 = $item['K'];

            $plan_3 = $item['L'];
            $fact_3 = $item['M'];

            $plan_4 = $item['N'];
            $fact_4 = $item['O'];

            $plan_5 = $item['P'];
            $fact_5 = $item['Q'];

            $plan_6 = $item['R'];
            $fact_6 = $item['S'];

            $plan_7 = $item['T'];
            $fact_7 = $item['U'];

            $plan_8 = $item['V'];
            $fact_8 = $item['W'];

            $plan_9 = $item['X'];
            $fact_9 = $item['Y'];

            $plan_10 = $item['Z'];
            $fact_10 = $item['AA'];

            $plan_11 = $item['AB'];
            $fact_11 = $item['AC'];

            $plan_12 = $item['AD'];
            $fact_12 = $item['AE'];
            $ob = $item['AF'];




            $insertArray[] = [
                "company_name" => $company_name,
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
