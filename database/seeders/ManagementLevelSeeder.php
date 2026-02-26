<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ManagementLevelSeeder extends Seeder
{
    public function run()
    {
        // Clear existing management level data
        DB::table('org_members')->whereIn('org_type', [
            'executive_director',
            'senior_management',
            'mid_management',
            'field_staff',
            'support_staff',
        ])->delete();

        $now = Carbon::now();

        // ============================================================
        // 1. EXECUTIVE DIRECTOR
        // ============================================================
        DB::table('org_members')->insert([
            'org_type'         => 'executive_director',
            'name'             => 'Nasima Akhter',
            'designation'      => 'Executive Director',
            'bio'              => 'Nasima Akhter has over 25 years of leadership experience in development, gender rights, and humanitarian response across Bangladesh. She oversees all programmatic and administrative functions of CDDF and is directly accountable to the Executive Committee.',
            'photo'            => null,
            'education'        => 'M.Sc. in Development Studies, University of Dhaka',
            'experience_years' => 25,
            'joining_date'     => '2010-03-15',
            'email'            => 'ed@cddf.org',
            'contact_number'   => '+880 1711-000001',
            'message'          => 'At CDDF, we believe that sustainable development begins with empowering the most marginalized communities — especially women and girls. Over the past decades, our dedicated teams have worked tirelessly in the field to translate our mission into measurable change. I am proud of every individual in this organization, from our board members to our frontline volunteers. Together, we remain committed to building a just, equitable, and dignified society for all.',
            'facebook'         => 'https://facebook.com/cddf.org',
            'linkedin'         => 'https://linkedin.com/in/nasima-akhter',
            'twitter'          => null,
            'instagram'        => null,
            'youtube'          => null,
            'order'            => 1,
            'is_active'        => 1,
            'created_at'       => $now,
            'updated_at'       => $now,
        ]);

        // ============================================================
        // 2. SENIOR MANAGEMENT TEAM (SMT)
        // ============================================================
        $smt = [
            [
                'name'             => 'Md. Rezaul Karim',
                'designation'      => 'Director – Program',
                'bio'              => 'Leads all programmatic operations including Sofol and livelihood programs. 18 years of experience in NGO program management across Bangladesh.',
                'education'        => 'MBA, North South University',
                'experience_years' => 18,
                'joining_date'     => '2013-06-01',
                'email'            => 'dir.program@cddf.org',
                'contact_number'   => '+880 1711-000002',
                'linkedin'         => 'https://linkedin.com/in/rezaulkarim',
                'order'            => 1,
            ],
            [
                'name'             => 'Farida Begum',
                'designation'      => 'Director – Finance',
                'bio'              => 'Oversees financial planning, budgeting, and compliance for all CDDF operations. A certified CPA with 15 years of audit and financial management experience.',
                'education'        => 'M.Com (Accounting), University of Chittagong',
                'experience_years' => 15,
                'joining_date'     => '2014-09-10',
                'email'            => 'dir.finance@cddf.org',
                'contact_number'   => '+880 1711-000003',
                'linkedin'         => null,
                'order'            => 2,
            ],
            [
                'name'             => 'Shafiqul Islam',
                'designation'      => 'Director – HR & Admin',
                'bio'              => 'Responsible for human resource strategy, recruitment, staff development, and administrative operations across all CDDF offices.',
                'education'        => 'MBA (HRM), BRAC University',
                'experience_years' => 12,
                'joining_date'     => '2015-01-20',
                'email'            => 'dir.hr@cddf.org',
                'contact_number'   => '+880 1711-000004',
                'linkedin'         => null,
                'order'            => 3,
            ],
            [
                'name'             => 'Roksana Parvin',
                'designation'      => 'Director – Communication & Resource Mobilization',
                'bio'              => 'Manages donor relations, fundraising strategy, external communications, and partnership development to sustain CDDF\'s mission.',
                'education'        => 'M.A. in Mass Communication, Jahangirnagar University',
                'experience_years' => 13,
                'joining_date'     => '2014-04-05',
                'email'            => 'dir.comm@cddf.org',
                'contact_number'   => '+880 1711-000005',
                'linkedin'         => 'https://linkedin.com/in/roksana-parvin',
                'order'            => 4,
            ],
            [
                'name'             => 'Alamgir Hossain',
                'designation'      => 'Director – RME',
                'bio'              => 'Leads Research, Monitoring & Evaluation across all programs. Designs impact frameworks and ensures evidence-based program decision-making.',
                'education'        => 'M.Sc. in Statistics, University of Rajshahi',
                'experience_years' => 14,
                'joining_date'     => '2013-11-12',
                'email'            => 'dir.rme@cddf.org',
                'contact_number'   => '+880 1711-000006',
                'linkedin'         => null,
                'order'            => 5,
            ],
            [
                'name'             => 'Sultana Razia',
                'designation'      => 'Director – Special Program',
                'bio'              => 'Oversees special initiatives including climate resilience, disability inclusion, and emergency response programs under CDDF.',
                'education'        => 'M.A. in Social Welfare, University of Dhaka',
                'experience_years' => 16,
                'joining_date'     => '2012-07-01',
                'email'            => 'dir.special@cddf.org',
                'contact_number'   => '+880 1711-000007',
                'linkedin'         => null,
                'order'            => 6,
            ],
        ];

        foreach ($smt as $m) {
            DB::table('org_members')->insert(array_merge($m, [
                'org_type'   => 'senior_management',
                'photo'      => null,
                'facebook'   => null,
                'twitter'    => null,
                'instagram'  => null,
                'youtube'    => null,
                'is_active'  => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }

        // ============================================================
        // 3. MID-LEVEL MANAGEMENT
        // ============================================================
        $mid = [
            [
                'name'             => 'Mizanur Rahman',
                'designation'      => 'Regional Manager – Sofol Program',
                'bio'              => 'Coordinates Sofol Program activities across four districts, ensuring quality service delivery and community engagement in field areas.',
                'education'        => 'B.Sc. in Social Science, Khulna University',
                'experience_years' => 10,
                'joining_date'     => '2016-03-01',
                'email'            => 'rm.sofol@cddf.org',
                'contact_number'   => '+880 1711-000010',
                'order'            => 1,
            ],
            [
                'name'             => 'Hosneara Khatun',
                'designation'      => 'Manager – Project (District Level)',
                'bio'              => 'Manages district-level project implementation, staff supervision, and stakeholder coordination for ongoing CDDF projects.',
                'education'        => 'M.S.S. in Public Administration, Jahangirnagar University',
                'experience_years' => 9,
                'joining_date'     => '2017-06-15',
                'email'            => 'pm.district@cddf.org',
                'contact_number'   => '+880 1711-000011',
                'order'            => 2,
            ],
            [
                'name'             => 'Taslima Khanam',
                'designation'      => 'Manager – Finance & Admin',
                'bio'              => 'Handles day-to-day financial reporting, procurement, and administrative management at CDDF head office.',
                'education'        => 'B.Com (Hons), University of Dhaka',
                'experience_years' => 8,
                'joining_date'     => '2018-01-10',
                'email'            => 'mgr.finance@cddf.org',
                'contact_number'   => '+880 1711-000012',
                'order'            => 3,
            ],
            [
                'name'             => 'Rafiqul Islam',
                'designation'      => 'Manager – Training & Research Center',
                'bio'              => 'Designs and delivers capacity building training programs for staff and community participants, and manages CDDF research agenda.',
                'education'        => 'M.Ed., Institute of Education and Research, Dhaka',
                'experience_years' => 11,
                'joining_date'     => '2015-09-20',
                'email'            => 'mgr.training@cddf.org',
                'contact_number'   => '+880 1711-000013',
                'order'            => 4,
            ],
            [
                'name'             => 'Nazmul Huda',
                'designation'      => 'Manager – MIS & ICT',
                'bio'              => 'Manages the management information system, data collection tools, and ICT infrastructure across all CDDF field offices.',
                'education'        => 'B.Sc. in Computer Science, BUET',
                'experience_years' => 7,
                'joining_date'     => '2019-04-01',
                'email'            => 'mgr.mis@cddf.org',
                'contact_number'   => '+880 1711-000014',
                'order'            => 5,
            ],
            [
                'name'             => 'Shirin Akter',
                'designation'      => 'Manager – Gender & Social Inclusion',
                'bio'              => 'Ensures gender mainstreaming and social inclusion principles are embedded across all programs and organizational policies.',
                'education'        => 'M.A. in Women and Gender Studies, University of Dhaka',
                'experience_years' => 9,
                'joining_date'     => '2017-02-14',
                'email'            => 'mgr.gender@cddf.org',
                'contact_number'   => '+880 1711-000015',
                'order'            => 6,
            ],
        ];

        foreach ($mid as $m) {
            DB::table('org_members')->insert(array_merge($m, [
                'org_type'   => 'mid_management',
                'photo'      => null,
                'facebook'   => null,
                'twitter'    => null,
                'instagram'  => null,
                'youtube'    => null,
                'linkedin'   => null,
                'message'    => null,
                'is_active'  => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }

        // ============================================================
        // 4. FIELD & FRONTLINE STAFF
        // ============================================================
        $field = [
            ['name' => 'Karim Uddin',      'designation' => 'Field Officer',        'bio' => 'Responsible for direct community outreach and beneficiary engagement in Rajshahi district.', 'education' => 'B.A., National University', 'experience_years' => 6, 'joining_date' => '2020-01-05', 'email' => 'karim.fo@cddf.org', 'contact_number' => '+880 1711-000020', 'order' => 1],
            ['name' => 'Laila Akther',      'designation' => 'Field Facilitator',    'bio' => 'Facilitates community group meetings, awareness sessions, and livelihood training in Sirajganj.', 'education' => 'H.S.C., Sirajganj Govt. College', 'experience_years' => 5, 'joining_date' => '2021-03-10', 'email' => 'laila.ff@cddf.org', 'contact_number' => '+880 1711-000021', 'order' => 2],
            ['name' => 'Jalal Uddin',       'designation' => 'Community Mobilizer',  'bio' => 'Mobilizes community volunteers and local leaders to support CDDF program activities in Chapai Nawabganj.', 'education' => 'S.S.C.', 'experience_years' => 4, 'joining_date' => '2022-06-01', 'email' => null, 'contact_number' => '+880 1711-000022', 'order' => 3],
            ['name' => 'Mosammat Renu',     'designation' => 'Community Volunteer',  'bio' => 'Serves as a frontline volunteer distributing information and supporting beneficiary registration in Naogaon.', 'education' => 'S.S.C.', 'experience_years' => 3, 'joining_date' => '2023-01-15', 'email' => null, 'contact_number' => '+880 1711-000023', 'order' => 4],
            ['name' => 'Arfan Ali',         'designation' => 'Field Officer',        'bio' => 'Coordinates beneficiary tracking, field data collection, and reporting for CDDF programs in Pabna.', 'education' => 'B.A., National University', 'experience_years' => 5, 'joining_date' => '2021-08-20', 'email' => 'arfan.fo@cddf.org', 'contact_number' => '+880 1711-000024', 'order' => 5],
            ['name' => 'Sultana Yasmin',    'designation' => 'Teacher',              'bio' => 'Delivers non-formal education and adult literacy classes in CDDF-run learning centers in Bogura.', 'education' => 'B.Ed., Teacher Training College', 'experience_years' => 7, 'joining_date' => '2019-11-01', 'email' => null, 'contact_number' => '+880 1711-000025', 'order' => 6],
            ['name' => 'Md. Belal Hossain', 'designation' => 'Field Facilitator',   'bio' => 'Supports group-based savings and livelihood activities for women beneficiaries in Natore district.', 'education' => 'H.S.C.', 'experience_years' => 4, 'joining_date' => '2022-02-28', 'email' => null, 'contact_number' => '+880 1711-000026', 'order' => 7],
            ['name' => 'Nazma Akter',       'designation' => 'Community Mobilizer',  'bio' => 'Organizes women self-help groups and liaises with local government offices in Rajshahi Sadar.', 'education' => 'S.S.C.', 'experience_years' => 3, 'joining_date' => '2023-03-01', 'email' => null, 'contact_number' => '+880 1711-000027', 'order' => 8],
        ];

        foreach ($field as $m) {
            DB::table('org_members')->insert(array_merge($m, [
                'org_type'   => 'field_staff',
                'photo'      => null,
                'facebook'   => null,
                'twitter'    => null,
                'instagram'  => null,
                'youtube'    => null,
                'linkedin'   => null,
                'message'    => null,
                'is_active'  => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }

        // ============================================================
        // 5. SUPPORT STAFF
        // ============================================================
        $support = [
            ['name' => 'Abul Kalam',          'designation' => 'Office Assistant',  'bio' => 'Provides administrative support, visitor management, and document handling at CDDF head office.', 'education' => 'H.S.C.', 'experience_years' => 8,  'joining_date' => '2018-05-01', 'email' => null, 'contact_number' => '+880 1711-000030', 'order' => 1],
            ['name' => 'Nurul Islam',          'designation' => 'Guard',             'bio' => 'Maintains security and access control at the CDDF head office premises.', 'education' => 'S.S.C.', 'experience_years' => 6,  'joining_date' => '2020-07-10', 'email' => null, 'contact_number' => '+880 1711-000031', 'order' => 2],
            ['name' => 'Salam Hawlader',       'designation' => 'Driver',            'bio' => 'Responsible for safe transportation of staff and materials for field visits and official duties.', 'education' => 'S.S.C.', 'experience_years' => 10, 'joining_date' => '2016-09-15', 'email' => null, 'contact_number' => '+880 1711-000032', 'order' => 3],
            ['name' => 'Rahela Begum',         'designation' => 'Cook',              'bio' => 'Manages kitchen operations and prepares meals for staff and training participants at CDDF premises.', 'education' => 'S.S.C.', 'experience_years' => 5,  'joining_date' => '2021-01-20', 'email' => null, 'contact_number' => '+880 1711-000033', 'order' => 4],
            ['name' => 'Md. Jahangir Alam',    'designation' => 'Office Peon',       'bio' => 'Assists in daily clerical tasks, dispatch of documents, and general office support functions.', 'education' => 'J.S.C.', 'experience_years' => 4,  'joining_date' => '2022-03-05', 'email' => null, 'contact_number' => '+880 1711-000034', 'order' => 5],
        ];

        foreach ($support as $m) {
            DB::table('org_members')->insert(array_merge($m, [
                'org_type'   => 'support_staff',
                'photo'      => null,
                'facebook'   => null,
                'twitter'    => null,
                'instagram'  => null,
                'youtube'    => null,
                'linkedin'   => null,
                'message'    => null,
                'is_active'  => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }

        $this->command->info('Management Level dummy data seeded successfully!');
        $this->command->info('  Executive Director : 1');
        $this->command->info('  SMT               : ' . count($smt));
        $this->command->info('  Mid-Level          : ' . count($mid));
        $this->command->info('  Field Staff        : ' . count($field));
        $this->command->info('  Support Staff      : ' . count($support));
    }
}
