<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImpactSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data
        DB::table('impact')->truncate();

        $impacts = [
            [
                'title'        => 'Years of Service',
                'metric_value' => '1998',
                'metric_unit'  => 'since',
                'description'  => 'CDDF has been serving communities in northern Bangladesh since 1998.',
                'icon'         => 'fa-regular fa-calendar-check',
                'year'         => null,
                'order'        => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'title'        => 'Districts Covered',
                'metric_value' => '3',
                'metric_unit'  => '+',
                'description'  => 'Operating across 3 districts of Rajshahi division in northern Bangladesh.',
                'icon'         => 'fa-solid fa-map-location-dot',
                'year'         => null,
                'order'        => 2,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'title'        => 'Projects Completed',
                'metric_value' => '41',
                'metric_unit'  => '+',
                'description'  => 'Over 41 community development projects successfully implemented.',
                'icon'         => 'fa-solid fa-hands-holding-circle',
                'year'         => null,
                'order'        => 3,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'title'        => 'People Reached',
                'metric_value' => '1300000',
                'metric_unit'  => 'M+',
                'description'  => 'Over 1.3 million lives positively impacted through our programs.',
                'icon'         => 'fa-solid fa-users-viewfinder',
                'year'         => null,
                'order'        => 4,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'title'        => 'Villages Covered',
                'metric_value' => '560',
                'metric_unit'  => '+',
                'description'  => 'Working across 560+ villages to bring sustainable change.',
                'icon'         => 'fa-solid fa-house-chimney',
                'year'         => null,
                'order'        => 5,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'title'        => 'Dedicated Staff',
                'metric_value' => '250',
                'metric_unit'  => '+',
                'description'  => 'A committed team of 250+ development professionals driving change.',
                'icon'         => 'fa-solid fa-user-tie',
                'year'         => null,
                'order'        => 6,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ];

        DB::table('impact')->insert($impacts);

        $this->command->info('Impact seeder ran successfully — 6 records inserted.');
    }
}
