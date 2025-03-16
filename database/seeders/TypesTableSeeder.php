<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params =[
            ['name' => '医療系'],
            ['name' => '食費系'],
            ['name' => '交通系'],
            ['name' => '交際系'],
            ['name' => '趣味系'],
            ['name' => 'その他'],
        ];

        $params->each(function ($param) {
            DB::table('types')->insert($param);
        });
    }
}
