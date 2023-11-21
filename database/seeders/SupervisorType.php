<?php

namespace Database\Seeders;

use App\Models\SupervisorTypeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupervisorType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupervisorTypeModel::create([
            'name' => 'Tibbiyot'
        ]);

        SupervisorTypeModel::create([
            'name' => 'Ijtimoiy'
        ]);
    }
}
