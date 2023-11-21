<?php

namespace Database\Seeders;

use App\Models\PriceCriteriaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PriceCriteriaModel::create([
            'name' => 2
        ]);

        PriceCriteriaModel::create([
            'name' => 3
        ]);

        PriceCriteriaModel::create([
            'name' => 4
        ]);

        PriceCriteriaModel::create([
            'name' => 5
        ]);
    }
}
