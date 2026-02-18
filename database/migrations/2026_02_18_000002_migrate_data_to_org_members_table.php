<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class MigrateDataToOrgMembersTable extends Migration
{
    public function up()
    {
        // Migrate executive_committee → org_members
        $executives = DB::table('executive_committee')->get();
        foreach ($executives as $item) {
            DB::table('org_members')->insert([
                'org_type'    => 'executive_committee',
                'name'        => $item->name,
                'designation' => $item->designation,
                'bio'         => $item->bio ?? null,
                'photo'       => $item->photo ?? null,
                'facebook'    => $item->facebook ?? null,
                'twitter'     => $item->twitter ?? null,
                'instagram'   => $item->instagram ?? null,
                'youtube'     => $item->youtube ?? null,
                'order'       => $item->order ?? 0,
                'is_active'   => true,
                'created_at'  => $item->created_at,
                'updated_at'  => $item->updated_at,
            ]);
        }

        // Migrate team_members → org_members (as senior_management by default)
        $teamMembers = DB::table('team_members')->get();
        foreach ($teamMembers as $item) {
            DB::table('org_members')->insert([
                'org_type'    => 'senior_management',
                'name'        => $item->name,
                'designation' => $item->designation,
                'department'  => $item->department ?? null,
                'bio'         => $item->bio ?? null,
                'photo'       => $item->photo ?? null,
                'facebook'    => $item->facebook ?? null,
                'twitter'     => $item->twitter ?? null,
                'instagram'   => $item->instagram ?? null,
                'youtube'     => $item->youtube ?? null,
                'order'       => $item->order ?? 0,
                'is_active'   => true,
                'created_at'  => $item->created_at,
                'updated_at'  => $item->updated_at,
            ]);
        }

        // Insert dummy data for all governance layers
        $dummyPhoto = '61831team.png';
        $now = now();

        $dummies = [
            // General Council — 21 members
            ['org_type' => 'general_council', 'name' => 'Rashida Begum', 'designation' => 'General Council Member', 'order' => 1],
            ['org_type' => 'general_council', 'name' => 'Nasrin Akter', 'designation' => 'General Council Member', 'order' => 2],
            ['org_type' => 'general_council', 'name' => 'Farida Khanam', 'designation' => 'General Council Member', 'order' => 3],
            ['org_type' => 'general_council', 'name' => 'Sultana Parvin', 'designation' => 'General Council Member', 'order' => 4],
            ['org_type' => 'general_council', 'name' => 'Momotaj Begum', 'designation' => 'General Council Member', 'order' => 5],
            ['org_type' => 'general_council', 'name' => 'Jannat Ara', 'designation' => 'General Council Member', 'order' => 6],
            ['org_type' => 'general_council', 'name' => 'Bilkis Begum', 'designation' => 'General Council Member', 'order' => 7],
            ['org_type' => 'general_council', 'name' => 'Hamida Khatun', 'designation' => 'General Council Member', 'order' => 8],
            ['org_type' => 'general_council', 'name' => 'Rokeya Sultana', 'designation' => 'General Council Member', 'order' => 9],
            ['org_type' => 'general_council', 'name' => 'Rahela Begum', 'designation' => 'General Council Member', 'order' => 10],
            ['org_type' => 'general_council', 'name' => 'Tahmina Akter', 'designation' => 'General Council Member', 'order' => 11],
            ['org_type' => 'general_council', 'name' => 'Salma Khanam', 'designation' => 'General Council Member', 'order' => 12],
            ['org_type' => 'general_council', 'name' => 'Nargis Begum', 'designation' => 'General Council Member', 'order' => 13],
            ['org_type' => 'general_council', 'name' => 'Kohinoor Akter', 'designation' => 'General Council Member', 'order' => 14],
            ['org_type' => 'general_council', 'name' => 'Morsheda Begum', 'designation' => 'General Council Member', 'order' => 15],
            ['org_type' => 'general_council', 'name' => 'Amena Khatun', 'designation' => 'General Council Member', 'order' => 16],
            ['org_type' => 'general_council', 'name' => 'Shahin Sultana', 'designation' => 'General Council Member', 'order' => 17],
            ['org_type' => 'general_council', 'name' => 'Parvin Akter', 'designation' => 'General Council Member', 'order' => 18],
            ['org_type' => 'general_council', 'name' => 'Laila Begum', 'designation' => 'General Council Member', 'order' => 19],
            ['org_type' => 'general_council', 'name' => 'Ferdousi Khanam', 'designation' => 'General Council Member', 'order' => 20],
            ['org_type' => 'general_council', 'name' => 'Jasmine Akter', 'designation' => 'General Council Member', 'order' => 21],

            // Advisory Council — 3 members
            ['org_type' => 'advisory_council', 'name' => 'Prof. Dr. Anwara Begum', 'designation' => 'Advisory Council Member', 'order' => 1],
            ['org_type' => 'advisory_council', 'name' => 'Advocate Shirin Akter', 'designation' => 'Advisory Council Member', 'order' => 2],
            ['org_type' => 'advisory_council', 'name' => 'Dr. Kamrun Naher', 'designation' => 'Advisory Council Member', 'order' => 3],

            // Executive Director
            ['org_type' => 'executive_director', 'name' => 'Nasrin Jahan', 'designation' => 'Executive Director (ED)', 'order' => 1],

            // Senior Management Team — 6 members
            ['org_type' => 'senior_management', 'name' => 'Khaleda Akter', 'designation' => 'Director – Program', 'department' => 'Program', 'order' => 1],
            ['org_type' => 'senior_management', 'name' => 'Rehana Parvin', 'designation' => 'Director – Finance', 'department' => 'Finance', 'order' => 2],
            ['org_type' => 'senior_management', 'name' => 'Farhana Sultana', 'designation' => 'Director – HR & Admin', 'department' => 'HR & Admin', 'order' => 3],
            ['org_type' => 'senior_management', 'name' => 'Sabina Yasmin', 'designation' => 'Director – Communication & Resource Mobilization', 'department' => 'Communication', 'order' => 4],
            ['org_type' => 'senior_management', 'name' => 'Tanzila Begum', 'designation' => 'Director – Research, Monitoring & Evaluation (RME)', 'department' => 'RME', 'order' => 5],
            ['org_type' => 'senior_management', 'name' => 'Roksana Islam', 'designation' => 'Director – Special Program', 'department' => 'Special Program', 'order' => 6],

            // Mid-Level Management — 4 members
            ['org_type' => 'mid_management', 'name' => 'Shahana Begum', 'designation' => 'Regional Manager – Sofol Program', 'department' => 'Sofol Program', 'order' => 1],
            ['org_type' => 'mid_management', 'name' => 'Dilruba Akter', 'designation' => 'Manager – Project (District/Upazila)', 'department' => 'Project', 'order' => 2],
            ['org_type' => 'mid_management', 'name' => 'Monira Khanam', 'designation' => 'Manager – Finance & Admin', 'department' => 'Finance & Admin', 'order' => 3],
            ['org_type' => 'mid_management', 'name' => 'Sumaiya Islam', 'designation' => 'Manager – Training & Research Center', 'department' => 'Training & Research', 'order' => 4],

            // Field Staff — 5 members
            ['org_type' => 'field_staff', 'name' => 'Rima Begum', 'designation' => 'Field Officer', 'order' => 1],
            ['org_type' => 'field_staff', 'name' => 'Simanto Hossain', 'designation' => 'Field Facilitator', 'order' => 2],
            ['org_type' => 'field_staff', 'name' => 'Nazmun Naher', 'designation' => 'Community Mobilizer', 'order' => 3],
            ['org_type' => 'field_staff', 'name' => 'Afsana Mimi', 'designation' => 'Community Volunteer', 'order' => 4],
            ['org_type' => 'field_staff', 'name' => 'Sadia Islam', 'designation' => 'Teacher', 'order' => 5],

            // Support Staff — 4 members
            ['org_type' => 'support_staff', 'name' => 'Rafiqul Islam', 'designation' => 'Office Assistant', 'order' => 1],
            ['org_type' => 'support_staff', 'name' => 'Abul Hossain', 'designation' => 'Guard', 'order' => 2],
            ['org_type' => 'support_staff', 'name' => 'Karim Driver', 'designation' => 'Driver', 'order' => 3],
            ['org_type' => 'support_staff', 'name' => 'Rina Cook', 'designation' => 'Cook', 'order' => 4],
        ];

        foreach ($dummies as $dummy) {
            DB::table('org_members')->insert([
                'org_type'    => $dummy['org_type'],
                'name'        => $dummy['name'],
                'designation' => $dummy['designation'],
                'department'  => $dummy['department'] ?? null,
                'photo'       => $dummyPhoto,
                'bio'         => null,
                'order'       => $dummy['order'],
                'is_active'   => true,
                'created_at'  => $now,
                'updated_at'  => $now,
            ]);
        }
    }

    public function down()
    {
        DB::table('org_members')->truncate();
    }
}
