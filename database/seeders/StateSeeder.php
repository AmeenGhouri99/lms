<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('states')->delete();

        $data = [
            array('id' => '2723', 'name' => 'Baluchistan', 'country_id' => '166', 'status' => '1', 'created_at' => '2021-04-06 06:11:20', 'updated_at' => '2023-08-13 17:37:10', 'deleted_at' => NULL),
            array('id' => '2724', 'name' => 'Federal Capital Area', 'country_id' => '166', 'status' => '1', 'created_at' => '2021-04-06 06:11:20', 'updated_at' => '2023-08-13 17:37:10', 'deleted_at' => NULL),
            array('id' => '2725', 'name' => 'Federally administered Tribal ', 'country_id' => '166', 'status' => '1', 'created_at' => '2021-04-06 06:11:20', 'updated_at' => '2023-08-13 17:37:10', 'deleted_at' => NULL),
            array('id' => '2726', 'name' => 'North-West Frontier', 'country_id' => '166', 'status' => '1', 'created_at' => '2021-04-06 06:11:20', 'updated_at' => '2023-08-13 17:37:10', 'deleted_at' => NULL),
            array('id' => '2727', 'name' => 'Northern Areas', 'country_id' => '166', 'status' => '1', 'created_at' => '2021-04-06 06:11:20', 'updated_at' => '2023-08-13 17:37:10', 'deleted_at' => NULL),
            array('id' => '2728', 'name' => 'Punjab', 'country_id' => '166', 'status' => '1', 'created_at' => '2021-04-06 06:11:20', 'updated_at' => '2023-08-13 17:37:10', 'deleted_at' => NULL),
            array('id' => '2729', 'name' => 'Sind', 'country_id' => '166', 'status' => '1', 'created_at' => '2021-04-06 06:11:20', 'updated_at' => '2023-08-13 17:37:10', 'deleted_at' => NULL),
        ];

        DB::table('states')->insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
