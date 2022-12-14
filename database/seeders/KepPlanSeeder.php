<?php

namespace Database\Seeders;

use App\Models\KepPlan;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class KepPlanSeeder extends Seeder
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

        KepPlan::where('year', $year)
        ->where('company_id', $company_id)
            ->forceDelete();

        $spreadsheet = $reader->load($filename);

        //-1 что бы обрезать итого
        $num_rows = $spreadsheet->getActiveSheet()->getHighestRow();

        $dataArray = $spreadsheet->getActiveSheet()
            ->rangeToArray(
                "A2:F$num_rows",     // The worksheet range that we want to retrieve
                '',        // Value that should be returned for empty cells
                true,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                true,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                true         // Should the array be indexed by cell row and cell column
            );


        foreach ($dataArray as $key => $item){

            $insertArray =[];
            $mount = $item['A'];
            $nomenclature = $item['B'];
            $val = $item['C'];




            $insertArray[] = [
                "mount"=> $mount,
                "nomenclature"=> $nomenclature,
                "val"=> $val,
                "year"=> $year,
                "company_id"=> $company_id
            ];

            var_dump($insertArray);




            $result = \DB::table('kep_plan')->insert($insertArray);

        }




    }


    public function run()
    {



        $filename_2022 = storage_path('app/kep/36/2022/plan.xlsx');



        if (file_exists($filename_2022)) {
            $this->import($filename_2022, 2022, 36);
        } else {
            echo "Файл {$filename_2022} не найден " . PHP_EOL;
        }



    }
}
