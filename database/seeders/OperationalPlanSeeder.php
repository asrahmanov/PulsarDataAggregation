<?php

namespace Database\Seeders;

use App\Models\OperationalPlan;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class OperationalPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function import($filename, $year, $company_id)
    {

        OperationalPlan::where('company_id',$company_id)
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
                "A2:N$num_rows",     // The worksheet range that we want to retrieve
                '',        // Value that should be returned for empty cells
                false,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                true,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                true         // Should the array be indexed by cell row and cell column
            );


        foreach ($dataArray as $key => $item) {
            $insertArray = [];
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

            if($company_name == '') {
                break;
            }

            $sum = $item['C'];

            $insertArray[] = [
                "short_name" => $short_name,
                "company_name" => $company_name,
                "company_id" => $company_id,
                "year" => $year,
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
            \DB::table('operational_plan')->insert($insertArray);
        }


    }


    public function run()
    {


        $filename_2021 = storage_path('app/operationalPlan/17/2021/Оперативный план.xlsx');
        $filename_2022 = storage_path('app/operationalPlan/17/2022/Оперативный план.xlsx');
        $filename_2023 = storage_path('app/operationalPlan/17/2023/Оперативный план.xlsx');

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



        $filename_2021 = storage_path('app/operationalPlan/36/2021/Оперативный план.xlsx');
        $filename_2022 = storage_path('app/operationalPlan/36/2022/Оперативный план.xlsx');
        $filename_2023 = storage_path('app/operationalPlan/36/2023/Оперативный план.xlsx');

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
