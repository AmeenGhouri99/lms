<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BoardUniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Federal Board of Intermediate and Secondary Education (FBISE)'],
            ['name' => 'BISE Lahore'],
            ['name' => 'BISE Rawalpindi'],
            ['name' => 'BISE Gujranwala'],
            ['name' => 'BISE Faisalabad'],
            ['name' => 'BISE Multan'],
            ['name' => 'BISE Sargodha'],
            ['name' => 'BISE Bahawalpur'],
            ['name' => 'BISE Dera Ghazi Khan'],
            ['name' => 'BISE Sahiwal'],
            ['name' => 'BISE Karachi'],
            ['name' => 'BISE Hyderabad'],
            ['name' => 'BISE Sukkur'],
            ['name' => 'BISE Mirpurkhas'],
            ['name' => 'BISE Larkana'],
            ['name' => 'BISE Peshawar'],
            ['name' => 'BISE Swat'],
            ['name' => 'BISE Kohat'],
            ['name' => 'BISE Malakand'],
            ['name' => 'BISE Abbottabad'],
            ['name' => 'BISE Bannu'],
            ['name' => 'BISE Mardan'],
            ['name' => 'BISE Dera Ismail Khan'],
            ['name' => 'BISE Quetta'],
            ['name' => 'BISE Mirpur (AJK)'],
            ['name' => 'Quaid-i-Azam University, Islamabad'],
            ['name' => 'University of the Punjab, Lahore'],
            ['name' => 'University of Karachi, Karachi'],
            ['name' => 'University of Peshawar, Peshawar'],
            ['name' => 'University of Balochistan, Quetta'],
            ['name' => 'Allama Iqbal Open University, Islamabad'],
            ['name' => 'National University of Sciences and Technology (NUST), Islamabad'],
            ['name' => 'University of Engineering and Technology (UET), Lahore'],
            ['name' => 'COMSATS Institute of Information Technology, Islamabad'],
            ['name' => 'Pakistan Institute of Engineering and Applied Sciences (PIEAS), Islamabad'],
            ['name' => 'University of Agriculture, Faisalabad'],
            ['name' => 'Government College University, Lahore'],
            ['name' => 'University of Sargodha, Sargodha'],
            ['name' => 'University of Sindh, Jamshoro'],
            ['name' => 'Aga Khan University, Karachi'],
            ['name' => 'Lahore University of Management Sciences (LUMS), Lahore'],
            ['name' => 'Habib University, Karachi'],
            ['name' => 'Institute of Business Administration (IBA), Karachi'],
            ['name' => 'Forman Christian College University, Lahore'],
            ['name' => 'University of Management and Technology (UMT), Lahore'],
            ['name' => 'Beaconhouse National University, Lahore'],
            ['name' => 'Institute of Space Technology (IST), Islamabad'],
            ['name' => 'Ghulam Ishaq Khan Institute of Engineering Sciences and Technology (GIKI), Swabi'],
            ['name' => 'Riphah International University, Islamabad'],
        ];

        foreach ($data as $item) {
            DB::table('board_university')->insert([
                'name' => $item['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
