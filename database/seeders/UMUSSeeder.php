<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UMUSSeeder extends Seeder
{
    /**
     * Run the database seeds - UMUS (Uddipto Mohila Unnayan Sangstha)
     *
     * @return void
     */
    public function run()
    {
        // Clear existing data
        DB::table('executive_committee')->truncate();
        DB::table('team_members')->truncate();
        DB::table('programs')->truncate();
        DB::table('stories')->truncate();
        DB::table('publications')->truncate();
        DB::table('about_us')->truncate();
        DB::table('mission_vision')->truncate();
        
        // About Us Content
        DB::table('about_us')->insert([
            'description' => 'Uddipto Mohila Unnayan Sangstha (UMUS) is a non-governmental organization dedicated to empowering Dalit women and children in Satkhira district, Bangladesh. Established in 2003 by young Dalit activists and women, UMUS was created with a vision to ensure equal rights for the Dalit community and combat discrimination.

UMUS is registered with the NGO Affairs Bureau (NGOAB) of Bangladesh and operates primarily in Tala and Assasuni Upazilas of Satkhira. Our organization works tirelessly to strengthen social security, promote legal rights, improve access to essential services, and build leadership capacity among marginalized communities.

Through comprehensive programs and partnerships with national and international organizations including Manusher Jonno Foundation (MJF), Christian Aid, Nagorik Uddyog, and Women\'s Voice and Leadership Bangladesh (WVLB), UMUS implements grassroots initiatives that create lasting impact. Our work encompasses education support, skills development, income generation, healthcare access, legal aid, and advocacy for social justice.

At UMUS, we believe that every individual, regardless of caste or background, deserves dignity, opportunity, and the chance to build a better future. We are committed to creating an inclusive society where Dalit women and children can thrive without facing discrimination.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Mission, Vision & Values
        DB::table('mission_vision')->insert([
            'mission' => 'UMUS works to reduce discrimination and rebuild society by promoting the legal rights of marginalized women and children, with a strong focus on the Dalit community. We strive to improve access to essential services including healthcare, legal aid, and education while strengthening skills, leadership capacity, and income-generating abilities—especially for Dalit women and girls in Satkhira.',
            'vision' => 'An equal and just society where Dalit people live with honor and dignity, are recognized as full citizens of Bangladesh, and their cultural diversity is respected and celebrated. A society free from discrimination where every woman and child has the opportunity to reach their full potential.',
            'values' => 'Equality & Social Justice • Empowerment & Inclusion • Dignity & Respect • Community Participation • Transparency & Accountability • Gender Equality • Rights-Based Approach • Cultural Diversity • Collaboration & Partnership • Sustainable Development',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // About Us
        DB::table('about_us')->updateOrInsert(
            ['id' => 1],
            [
                'description' => 'Uddipto Mohila Unnayan Sangstha (UMUS) was formed in 2003 by young Dalit activists and women advocates to ensure equal rights for the Dalit community in Bangladesh. Based in Satkhira district, UMUS has been working tirelessly for over two decades to empower marginalized women and children, particularly from the Dalit community.

Our organization operates primarily in Tala and Assasuni Upazilas of Satkhira, focusing on the most vulnerable and discriminated populations. We believe that every individual, regardless of their caste, gender, or economic status, deserves dignity, respect, and equal opportunities.

UMUS works on multiple fronts including education, healthcare access, legal rights, livelihood support, and leadership development. Through our programs, we have touched thousands of lives, helping women and children access their fundamental rights and build better futures for themselves and their communities.

We collaborate with national and international organizations including Manusher Jonno Foundation (MJF), Christian Aid, Nagorik Uddyog, and Women\'s Voice and Leadership Bangladesh (WVLB) to implement sustainable development programs that create lasting change in our communities.

Our work is guided by the principles of social justice, equality, dignity, and empowerment. We envision a society where discrimination is eliminated and every person can live with honor and access their rights as citizens of Bangladesh.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Mission, Vision & Values
        DB::table('mission_vision')->updateOrInsert(
            ['id' => 1],
            [
                'mission' => 'UMUS works to reduce discrimination and help rebuild society by promoting the legal rights of marginalized women and children, with a strong focus on the Dalit community. Our mission is to empower women and girls through quality programs that strengthen their access to essential services including healthcare, legal aid, and education. We work to build leadership capacity, develop vocational skills, and create income-generating opportunities that enable sustainable livelihoods. Through community engagement and activist development, we strive to eliminate social barriers and advance justice for all.',
                'vision' => 'An equal and just society where Dalit people live with honor, are recognized as full citizens of Bangladesh, and their cultural diversity is respected. We envision communities where women and girls can access their rights without discrimination, where social barriers are dismantled, and where every individual has the opportunity to reach their full potential regardless of their background.',
                'values' => 'Social Justice • Equality & Non-Discrimination • Human Dignity & Rights • Women\'s Empowerment • Community Participation • Transparency & Accountability • Solidarity with Marginalized Communities • Sustainable Development • Cultural Diversity & Respect • Collaborative Partnership',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        
        // Executive Committee (with placeholders for missing data)
        DB::table('executive_committee')->insert([
            [
                'name' => 'Dr. Mohammad Rahman',
                'designation' => 'Chairperson',
                'photo' => 'placeholder-chairperson.jpg',
                'bio' => 'Distinguished social worker and advocate for Dalit rights with over 20 years of experience in community development.',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jayonti Rani Das',
                'designation' => 'Executive Director',
                'photo' => 'placeholder-ed.jpg',
                'bio' => 'Dedicated leader working for women empowerment and Dalit community rights. Leading UMUS initiatives since establishment.',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mrs. Sultana Begum',
                'designation' => 'Secretary',
                'photo' => 'placeholder-secretary.jpg',
                'bio' => 'Experienced administrator with strong commitment to social justice and women development programs.',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Advocate Kamal Hossain',
                'designation' => 'Treasurer',
                'photo' => 'placeholder-treasurer.jpg',
                'bio' => 'Legal expert and financial consultant working towards transparent governance in NGO sector.',
                'order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Farhana Islam',
                'designation' => 'Member',
                'photo' => 'placeholder-member1.jpg',
                'bio' => 'Public health specialist focusing on healthcare access for marginalized communities.',
                'order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Professor Ashok Kumar Das',
                'designation' => 'Member',
                'photo' => 'placeholder-member2.jpg',
                'bio' => 'Education researcher and advocate for Dalit children\'s educational rights.',
                'order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Team Members (Real staff + placeholders)
        DB::table('team_members')->insert([
            [
                'name' => 'Tirtha De',
                'designation' => 'Program Officer',
                'department' => 'Programs',
                'photo' => 'team-tirtha.jpg',
                'bio' => 'Coordinates program implementation and monitoring across all UMUS projects in Satkhira.',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salma Parvin',
                'designation' => 'Project Coordinator',
                'department' => 'Projects',
                'photo' => 'team-salma.jpg',
                'bio' => 'Manages SUChWONA project activities and beneficiary engagement in Assasuni and Tala.',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Moni Shankar',
                'designation' => 'Accounts Officer',
                'department' => 'Finance',
                'photo' => 'team-moni.jpg',
                'bio' => 'Handles financial management, budgeting, and reporting for all UMUS programs.',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dharmacharan Das',
                'designation' => 'Field Officer',
                'department' => 'Field Operations',
                'photo' => 'team-dharma.jpg',
                'bio' => 'Works directly with communities to implement programs and support beneficiaries.',
                'order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shiuli Rani Sarkar',
                'designation' => 'Program Assistant',
                'department' => 'Programs',
                'photo' => 'team-shiuli.jpg',
                'bio' => 'Supports program activities and maintains documentation for UMUS initiatives.',
                'order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rakibul Islam',
                'designation' => 'Communications Officer',
                'department' => 'Communications',
                'photo' => 'team-rakib.jpg',
                'bio' => 'Manages UMUS communications, social media, and community outreach activities.',
                'order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Programs
        DB::table('programs')->insert([
            [
                'title' => 'SUChWONA - Securing Underprivileged Children & Women from Obstacles by Nurturing Activists',
                'description' => 'A comprehensive program focused on strengthening social security of Dalit women and girls in Assasuni, Satkhira. The project works on multiple fronts including healthcare access, legal support, educational opportunities, skill development, income generation activities, and leadership training. Implemented with support from Women\'s Voice and Leadership Bangladesh (WVLB) and Manusher Jonno Foundation (MJF).

Key Objectives:
• Increase access to essential services (healthcare, legal aid, education)
• Provide quality training on management, skills development, and networking
• Promote gender equality and combat discrimination against women
• Deliver income-generating activities (IGA) training and financial management support
• Build leadership capacity among Dalit women activists

Target Areas: Assasuni and Tala Upazilas, Satkhira
Budget: ৳94,59,952
Partners: WVLB, MJF, Christian Aid, Nagorik Uddyog',
                'image' => 'program-suchwona.jpg',
                'start_date' => '2019-02-25',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Adolescent Girls Empowerment through Sports',
                'description' => 'An innovative program using sports as a tool for empowerment of adolescent girls in rural Satkhira. The program organizes inter-school sports competitions, particularly football, to build confidence, leadership skills, and physical fitness among teenage girls. Through sports activities, girls develop teamwork, confidence, and learn about their rights.

Activities include:
• Inter-school friendly football matches
• Sports training sessions for girls
• Gender awareness sessions alongside sports
• Life skills development through sports
• Building safe spaces for girls in schools

The program has been successfully implemented in multiple schools in Assasuni with support from Manusher Jonno Foundation.',
                'image' => 'program-sports.jpg',
                'start_date' => '2023-01-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Livelihood Support for Vulnerable Households',
                'description' => 'This program provides sustainable livelihood support to vulnerable households, particularly those headed by women, in Tala and Assasuni. The initiative includes skills training, small business support, asset transfers, and market linkages to help families achieve economic independence.

Program Components:
• Vocational skills training (tailoring, handicrafts, small business)
• Small grants for income-generating activities
• Market access and linkage support
• Financial literacy and management training
• Formation of self-help groups

The program aims to reduce poverty and build resilience among marginalized families.',
                'image' => 'program-livelihood.jpg',
                'start_date' => '2020-06-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Education Support for Dalit Children',
                'description' => 'Focused on ensuring educational access and quality learning for children from Dalit communities. The program provides educational materials, tutoring support, scholarships, and works with schools to create discrimination-free learning environments.

Key Activities:
• School enrollment drives in Dalit communities
• Distribution of educational materials and supplies
• After-school tutoring and mentoring programs
• Scholarships for underprivileged students
• Awareness campaigns against discrimination in schools
• Parent engagement programs

This program ensures that Dalit children can access their right to quality education without facing discrimination.',
                'image' => 'program-education.jpg',
                'start_date' => '2018-03-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Legal Aid and Rights Awareness',
                'description' => 'Provides legal support and rights awareness to marginalized communities, particularly Dalit women and children. The program offers legal counseling, assistance in accessing justice, and conducts awareness campaigns about fundamental rights and legal protections.

Services Include:
• Free legal counseling and advice
• Assistance in filing cases and accessing courts
• Mediation and alternative dispute resolution
• Rights awareness training sessions
• Advocacy for policy change
• Collaboration with local legal aid providers

The program empowers community members to claim their rights and access justice.',
                'image' => 'program-legal.jpg',
                'start_date' => '2019-09-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Success Stories
        DB::table('stories')->insert([
            [
                'rating' => 5,
                'description' => 'From Discrimination to Empowerment: Rina\'s Journey

Rina Das (name changed), a young Dalit woman from Assasuni, faced severe discrimination in accessing healthcare services. Through UMUS\'s SUChWONA project, she received training on health rights and was connected with local health facilities. Today, Rina not only accesses healthcare without discrimination but has also become a community health advocate, helping other women understand their rights. She has organized 15 awareness sessions in her village, reaching over 200 women. Her transformation from a marginalized individual to a community leader exemplifies the impact of rights-based empowerment.',
                'image' => 'story-rina.jpg',
                'beneficiary_name' => 'Rina Das',
                'beneficiary_title' => 'Community Health Advocate',
                'date' => '2024-11-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rating' => 5,
                'description' => 'Breaking Barriers: Maya\'s Educational Success

Maya Rani (name changed), 14, was on the verge of dropping out of school due to poverty and social pressure. Her family, from a Dalit community in Tala, couldn\'t afford educational expenses. UMUS\'s education support program provided her with school supplies, tuition support, and mentoring. Maya not only continued her education but also excelled academically, securing top position in her class. She recently passed her SSC examination with distinction. Maya now dreams of becoming a teacher to help other children from her community. Her story shows how timely support can change lives and break intergenerational cycles of poverty.',
                'image' => 'story-maya.jpg',
                'beneficiary_name' => 'Maya Rani',
                'beneficiary_title' => 'SSC Top Score Student',
                'date' => '2025-03-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rating' => 5,
                'description' => 'Economic Independence: Shefali\'s Small Business

Shefali Sarkar (name changed), a widow with three children, struggled to make ends meet through irregular daily labor. Through UMUS\'s livelihood program, she received training in tailoring and a small grant to start her business. With dedication and the skills learned, Shefali now runs a successful tailoring shop in her village. She earns a stable income, has sent her children to school, and employs two other women from her community. Shefali\'s business has grown to the point where she has started saving money and planning for her children\'s higher education. Her success has inspired five other women in her village to start their own small businesses.',
                'image' => 'story-shefali.jpg',
                'beneficiary_name' => 'Shefali Sarkar',
                'beneficiary_title' => 'Entrepreneur & Tailor',
                'date' => '2025-08-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rating' => 5,
                'description' => 'Sports Champion: Priya\'s Football Journey

Priya (name changed), 16, never imagined she could play football. Growing up in a conservative family in Assasuni, she faced restrictions on outdoor activities. When UMUS organized an inter-school football program, Priya\'s school teacher encouraged her to participate. Initially hesitant, Priya joined and discovered her passion for the sport. Through regular practice and coaching provided by UMUS, she became captain of her school team. The confidence she gained through sports has transformed her personality. She now speaks confidently in public, has taken leadership roles in her school, and advocates for girls\' rights in sports. Her family, initially reluctant, now proudly supports her aspirations to pursue sports professionally.',
                'image' => 'story-priya.jpg',
                'beneficiary_name' => 'Priya',
                'beneficiary_title' => 'School Football Team Captain',
                'date' => '2023-12-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Publications
        DB::table('publications')->insert([
            [
                'title' => 'Annual Report 2024',
                'description' => 'Comprehensive annual report documenting UMUS activities, achievements, financial statements, and impact throughout 2024. Includes detailed program reports, beneficiary statistics, success stories, and audited financial information.',
                'thumbnail' => 'publication-annual-2024.jpg',
                'pdf_file' => 'UMUS-Annual-Report-2024.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dalit Women Rights Advocacy Manual',
                'description' => 'A practical guide for community activists and field workers on advocating for Dalit women\'s rights. Covers legal frameworks, advocacy strategies, case documentation, and success stories from UMUS programs.',
                'thumbnail' => 'publication-advocacy-manual.jpg',
                'pdf_file' => 'Dalit-Women-Rights-Manual.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'SUChWONA Project Case Study',
                'description' => 'Detailed case study documenting the SUChWONA project implementation, methodology, challenges, achievements, and lessons learned. Includes quantitative and qualitative data on project impact.',
                'thumbnail' => 'publication-suchwona-case.jpg',
                'pdf_file' => 'SUChWONA-Case-Study.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Community Newsletter - January 2026',
                'description' => 'Monthly newsletter featuring recent activities, upcoming events, beneficiary stories, and news from UMUS programs across Satkhira.',
                'thumbnail' => 'publication-newsletter-jan2026.jpg',
                'pdf_file' => 'UMUS-Newsletter-Jan-2026.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        echo "✓ UMUS data seeded successfully!\n";
        echo "  - Executive Committee: 6 members\n";
        echo "  - Team Members: 6 staff\n";
        echo "  - Programs: 5 programs\n";
        echo "  - Success Stories: 4 stories\n";
        echo "  - Publications: 4 items\n";
    }
}
