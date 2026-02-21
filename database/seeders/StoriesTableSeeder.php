<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stories')->truncate();

        $stories = [
            [
                'beneficiary_name' => 'Rahima Begum',
                'beneficiary_title' => 'Community Leader',
                'description' => "The new school and clean water project have given our children a brighter future. We are forever grateful.",
                'image' => '2.png',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'beneficiary_name' => 'Dr. Kamal Hossain',
                'beneficiary_title' => 'Healthcare Professional',
                'description' => "Working with the foundation on mobile health clinics has been incredibly rewarding. They reach communities others forget.",
                'image' => '3.png',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'beneficiary_name' => 'Fatima Ahmed',
                'beneficiary_title' => 'Entrepreneur',
                'description' => "The vocational training program helped me start my own tailoring business. Now I can support my family.",
                'image' => '4.png',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'beneficiary_name' => 'Abdul Karim',
                'beneficiary_title' => 'Student',
                'description' => "Education initiative changed my life completely. I never thought I could learn so much.",
                'image' => '5.png',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'beneficiary_name' => 'Salma Khatun',
                'beneficiary_title' => 'Villager',
                'description' => "Clean water access has reduced illness in our village significantly. Thank you for the support.",
                'image' => '6.png',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'beneficiary_name' => 'Rafiqul Islam',
                'beneficiary_title' => 'Farmer',
                'description' => "The micro-finance support allowed us to rebuild after the flood. We are now self-sufficient.",
                'image' => '7.png',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('stories')->insert($stories);
    }
}
