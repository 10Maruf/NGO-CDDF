<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FocusAreaSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing focus areas
        DB::table('focus_areas')->truncate();

        $areas = [
            [
                'title'       => 'Women Empowerment',
                'icon_class'  => 'fa-solid fa-venus-double',
                'description' => 'Protecting women from domestic violence and early marriage while promoting equal rights, leadership, and economic independence through skill development and advocacy.',
                'order'       => 1,
            ],
            [
                'title'       => 'Quality Education',
                'icon_class'  => 'fa-solid fa-graduation-cap',
                'description' => 'Ensuring quality primary education, preventing school dropouts, and providing scholarships from primary to college level to build a literate and empowered generation.',
                'order'       => 2,
            ],
            [
                'title'       => 'Disaster Management',
                'icon_class'  => 'fa-solid fa-house-flood-water',
                'description' => 'Providing humanitarian support during disasters and emergencies — including floods, cyclones, and health crises like COVID-19 — with rapid response and recovery programs.',
                'order'       => 3,
            ],
            [
                'title'       => 'Disability Inclusion',
                'icon_class'  => 'fa-solid fa-wheelchair',
                'description' => 'Empowering persons with disabilities through skills training, rights advocacy, device support, and inclusive community programs to integrate them into mainstream society.',
                'order'       => 4,
            ],
            [
                'title'       => 'WATSAN',
                'icon_class'  => 'fa-solid fa-droplet',
                'description' => 'Ensuring access to safe drinking water, proper sanitation and hygiene facilities, with special focus on women and children in underserved communities.',
                'order'       => 5,
            ],
            [
                'title'       => 'Rights & Advocacy',
                'icon_class'  => 'fa-solid fa-scale-balanced',
                'description' => 'Advocating for the rights of landless and ultra-poor communities to access public services, and raising awareness on the Right to Information Act for all citizens.',
                'order'       => 6,
            ],
        ];

        $now = now();
        foreach ($areas as &$area) {
            $area['icon_path']  = null;
            $area['image_path'] = null;
            $area['is_active']  = 1;
            $area['created_at'] = $now;
            $area['updated_at'] = $now;
        }

        DB::table('focus_areas')->insert($areas);
    }
}
