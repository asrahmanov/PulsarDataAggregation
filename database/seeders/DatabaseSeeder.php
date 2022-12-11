<?php

namespace Database\Seeders;


use App\Models\Defect;
use App\Models\Forecast;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        ContractAndFactSeeder::class,
//        PlanContractSeeder::class,
        ExpectedRevenueSeeder::class,
//        OperationalPlanSeeder::class,
//        BudgetSeeder::class,
//        DefectSeeder::class,
//          TestSeeder::class,
//        ForecastSeeder::class,
//            KepSeeder::class,

        ]);
    }
}

