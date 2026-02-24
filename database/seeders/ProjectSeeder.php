<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\FocusArea;
use App\Models\Partner;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $images = [
            'about_us_bg.jpg',
            'contact_blk.jpg',
            'donation.jpg',
            'donation_blk.jpg',
            'focus_areas.jpeg',
            'focus_areas_blk.jpeg',
            'gallery_blk.jpg',
            'mission-vision_bg.jpg',
            'mission-vision_bg_blk.jpg',
            'news_event_blk.jpg'
        ];

        // Ensure project image directory exists
        $projectImgDir = public_path('images/project');
        if (!File::exists($projectImgDir)) {
            File::makeDirectory($projectImgDir, 0755, true);
        }

        $focusAreas = FocusArea::pluck('id')->toArray();
        $partners = Partner::pluck('id')->toArray();

        $projects = [
            // 10 Ongoing
            ['title' => 'Emergency Flood Relief in Sylhet', 'status' => 'ongoing', 'location' => 'Sylhet, Bangladesh'],
            ['title' => 'Women Empowerment through Skill Training', 'status' => 'ongoing', 'location' => 'Kurigram, Bangladesh'],
            ['title' => 'Clean Drinking Water for Coastal Areas', 'status' => 'ongoing', 'location' => 'Satkhira, Bangladesh'],
            ['title' => 'Child Education Support Program', 'status' => 'ongoing', 'location' => 'Dhaka Slums'],
            ['title' => 'Climate Resilience Agriculture', 'status' => 'ongoing', 'location' => 'Khulna, Bangladesh'],
            ['title' => 'Healthcare Access for Rural Communities', 'status' => 'ongoing', 'location' => 'Rangpur, Bangladesh'],
            ['title' => 'Youth Leadership Development', 'status' => 'ongoing', 'location' => 'Rajshahi, Bangladesh'],
            ['title' => 'Disaster Preparedness Training', 'status' => 'ongoing', 'location' => 'Cox\'s Bazar, Bangladesh'],
            ['title' => 'Nutrition Support for Pregnant Mothers', 'status' => 'ongoing', 'location' => 'Mymensingh, Bangladesh'],
            ['title' => 'Solar Panel Distribution in Off-grid Areas', 'status' => 'ongoing', 'location' => 'Bandarban, Bangladesh'],
            
            // 10 Completed
            ['title' => 'Cyclone Amphan Recovery Project', 'status' => 'completed', 'location' => 'Bagerhat, Bangladesh'],
            ['title' => 'Winter Clothes Distribution 2024', 'status' => 'completed', 'location' => 'Panchagarh, Bangladesh'],
            ['title' => 'Primary School Rebuilding Initiative', 'status' => 'completed', 'location' => 'Sunamganj, Bangladesh'],
            ['title' => 'Community Health Camp 2023', 'status' => 'completed', 'location' => 'Barisal, Bangladesh'],
            ['title' => 'Sanitation and Hygiene Awareness', 'status' => 'completed', 'location' => 'Bhola, Bangladesh'],
            ['title' => 'Livelihood Support for Fishermen', 'status' => 'completed', 'location' => 'Patuakhali, Bangladesh'],
            ['title' => 'Tree Plantation Drive 2023', 'status' => 'completed', 'location' => 'Gazipur, Bangladesh'],
            ['title' => 'Free Eye Camp for Elderly', 'status' => 'completed', 'location' => 'Comilla, Bangladesh'],
            ['title' => 'Vocational Training for Disabled Youth', 'status' => 'completed', 'location' => 'Faridpur, Bangladesh'],
            ['title' => 'COVID-19 Food Assistance Program', 'status' => 'completed', 'location' => 'Nationwide'],
        ];

        foreach ($projects as $index => $data) {
            // Pick a random image
            $sourceImage = $images[array_rand($images)];
            $sourcePath = public_path('static_image/' . $sourceImage);
            
            $newImageName = null;
            if (File::exists($sourcePath)) {
                $newImageName = 'seed_' . time() . '_' . $index . '_' . $sourceImage;
                File::copy($sourcePath, $projectImgDir . '/' . $newImageName);
            }

            $startDate = Carbon::now()->subMonths(rand(12, 36));
            $endDate = $data['status'] == 'completed' ? $startDate->copy()->addMonths(rand(3, 11)) : $startDate->copy()->addMonths(rand(12, 48));

            $project = Project::create([
                'title' => $data['title'],
                'slug' => Project::generateSlug($data['title']),
                'cover_image' => $newImageName,
                'short_description' => 'This is a dummy short description for the CDDF project: ' . $data['title'] . '. It aims to improve the lives of vulnerable communities.',
                'detail_description' => '<p>This is a detailed description for <strong>' . $data['title'] . '</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>',
                'status' => $data['status'],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'location' => $data['location'],
                'budget' => rand(500000, 5000000),
                'beneficiary_count' => rand(1000, 20000),
                'implementing_partner' => 'CDDF Core Team',
                'is_featured' => rand(0, 1) == 1,
                'order' => $index,
                'is_active' => true,
            ]);

            // Attach random focus areas (1 to 3)
            if (!empty($focusAreas)) {
                $randomFocusAreas = (array) array_rand(array_flip($focusAreas), rand(1, min(3, count($focusAreas))));
                $project->focusAreas()->sync($randomFocusAreas);
            }

            // Attach random partners (1 to 2)
            if (!empty($partners)) {
                $randomPartners = (array) array_rand(array_flip($partners), rand(1, min(2, count($partners))));
                $project->partners()->sync($randomPartners);
            }
        }
    }
}
