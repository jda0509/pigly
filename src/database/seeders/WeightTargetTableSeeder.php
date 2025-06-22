<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\WeightTarget;

class WeightTargetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'target_weight' => 58,
            'user_id' => 1
        ];
        DB::table('weight_target')->insert($param);
    }
}
