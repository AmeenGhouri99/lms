<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('domiciles')->delete();

        $data = [
            array('name' => 'Quetta', 'state_id' => '2723', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Gwadar', 'state_id' => '2723', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Turbat', 'state_id' => '2723', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Chaman', 'state_id' => '2723', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Khuzdar', 'state_id' => '2723', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array(
                'name' => 'Loralai',
                'state_id' => '2723',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),

            array(
                'name' => 'Hub',
                'state_id' => '2723',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),

            array(
                'name' => 'Nushki',
                'state_id' => '2723',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),

            array(
                'name' => 'Kharan',
                'state_id' => '2723',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),

            array(
                'name' => 'Sibi',
                'state_id' => '2723',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            //punjab domicile cities
            array(
                'name' => 'Sargodha',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Lahore',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Faisalabad',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Rawalpindi',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Multan',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Gujranwala',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Bahawalpur',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Sialkot',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Jhang',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Gujrat',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Sheikhupura',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Sahiwal',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Rahim Yar Khan',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Okara',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Wah Cantonment',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Dera Ghazi Khan',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Muzaffargarh',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Kasur',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Nankana Sahib',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Mandi Bahauddin',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Chiniot',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Shakargarh',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Gujranwala Cantonment',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Hafizabad',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Khushab',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Layyah',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Chakwal',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            array(
                'name' => 'Attock',
                'state_id' => '2728',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2023-01-01 00:00:00'
            ),
            // Sindh
            // Sindh
            array('name' => 'Karachi', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Hyderabad', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Sukkur', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Larkana', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Shaheed Benazirabad', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Mirpur Khas', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Dadu', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Jacobabad', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Thatta', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Badin', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Khairpur', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Ghotki', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Sanghar', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Tando Allahyar', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Tando Muhammad Khan', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Matiari', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Jamshoro', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Umerkot', 'state_id' => '2729', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            // Azad Jammu and Kashmir
            array('name' => 'Muzaffarabad', 'state_id' => '2730', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Mirpur', 'state_id' => '2730', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Peshawar', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Mardan', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Abbottabad', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Swat', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Kohat', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Dera Ismail Khan', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Bannu', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Charsadda', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Nowshera', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Haripur', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Mansehra', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Swabi', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Lower Dir', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Upper Dir', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Malakand', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Tank', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Lakki Marwat', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Hangu', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Karak', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Batagram', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Shangla', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Chitral', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Kohistan', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Torghar', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Kurram', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Orakzai', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'North Waziristan', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'South Waziristan', 'state_id' => '2725', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            // Gilgit-Baltistan
            array('name' => 'Gilgit', 'state_id' => '2727', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
            array('name' => 'Skardu', 'state_id' => '2727', 'created_at' => '2022-01-01 00:00:00', 'updated_at' => '2023-01-01 00:00:00'),
        ];

        DB::table('domiciles')->insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
