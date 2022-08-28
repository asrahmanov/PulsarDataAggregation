<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExpectedRevenueSeeder extends Seeder
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

        $spreadsheet = $reader->load(storage_path('app/25.08.22 форма по ожидаемой выручке.xlsx'));

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



        $insertArray =[];

        foreach ($dataArray as $key => $item){
            $company_name = $item['B'];

            if($company_name == '' ){
                break;
            }

            $mount = $item['C'];
            $sum = $item['D'];

            $insertArray[] = [
                "company_name"=>$company_name,
                "mount"=>$mount,
                "sum"=>$sum
            ];
        }



        \DB::table('expected_revenue')->insert($insertArray);
    }
}
