<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\WeightLog;
use App\Database\Factories\WeightLogsFactory;

class WeightLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WeightLog::factory()->count(35)->create();
    }
}
