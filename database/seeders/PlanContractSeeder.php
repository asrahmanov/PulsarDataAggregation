<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PlanContractSeeder extends Seeder
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

        $spreadsheet = $reader->load(storage_path('app/basic.xlsx'));

        //-1 что бы обрезать итого
        $num_rows = $spreadsheet->getActiveSheet()->getHighestRow();

        $dataArray = $spreadsheet->getActiveSheet()
            ->rangeToArray(
                "A1:W$num_rows",     // The worksheet range that we want to retrieve
                '',        // Value that should be returned for empty cells
                false,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                true,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                true         // Should the array be indexed by cell row and cell column
            );

//        $dir_crf_diseases = DirCrfDisease::all();
//        $dir_crf_disease_categories = DirCrfDiseaseCategories::all();
//        $dir_crf_localizations = DirCrfLocalization::all();

        $insertArray =[];

        foreach ($dataArray as $key => $item){
            $name_en = $item['B'];
            $name_ru = $item['A'];



            $insertArray[] = [
                "name_ru"=>$name_ru,
                "name_en"=>$name_en,
                "type"=>'basic',
            ];
        }



        \DB::table('dir_crf_diseases')->insert($insertArray);
    }
}
