<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            // Page hero banners
            $table->string('career_hero_banner')->nullable()->after('fav_icon');
            $table->string('about_us_banner')->nullable()->after('career_hero_banner');
            $table->string('contact_banner')->nullable()->after('about_us_banner');
            $table->string('donate_banner')->nullable()->after('contact_banner');
            $table->string('faq_banner')->nullable()->after('donate_banner');
            $table->string('mission_vision_banner')->nullable()->after('faq_banner');
            $table->string('key_focus_banner')->nullable()->after('mission_vision_banner');
            $table->string('governance_banner')->nullable()->after('key_focus_banner');
            $table->string('management_banner')->nullable()->after('governance_banner');
            $table->string('organogram_banner')->nullable()->after('management_banner');
            $table->string('news_banner')->nullable()->after('organogram_banner');
            $table->string('projects_banner')->nullable()->after('news_banner');
            $table->string('volunteer_banner')->nullable()->after('projects_banner');
            $table->string('gallery_banner')->nullable()->after('volunteer_banner');
            $table->string('origin_banner')->nullable()->after('gallery_banner');
            $table->string('policy_banner')->nullable()->after('origin_banner');
            $table->string('strategic_plan_banner')->nullable()->after('policy_banner');
            $table->string('publication_banner')->nullable()->after('strategic_plan_banner');
            $table->string('youtube_banner')->nullable()->after('publication_banner');
            // Home page section backgrounds
            $table->string('mission_vision_bg')->nullable()->after('youtube_banner');
            $table->string('impact_bg')->nullable()->after('mission_vision_bg');
        });

        // Copy existing static images to images/application/ and seed the DB
        $dest = public_path('images/application');
        if (!is_dir($dest)) {
            mkdir($dest, 0755, true);
        }

        // Map: db_column => source file (relative to public/)
        $imageMap = [
            'career_hero_banner'    => 'static_image/news_event_blk.jpg',
            'about_us_banner'       => 'static_image/about_us_bg.jpg',
            'contact_banner'        => 'static_image/contact_blk.jpg',
            'donate_banner'         => 'static_image/donation_blk.jpg',
            'faq_banner'            => 'static_image/about_us_bg.jpg',
            'mission_vision_banner' => 'static_image/mission-vision_bg_blk.jpg',
            'key_focus_banner'      => 'static_image/focus_areas_blk.jpeg',
            'governance_banner'     => 'static_image/about_us_bg.jpg',
            'management_banner'     => 'static_image/about_us_bg.jpg',
            'organogram_banner'     => 'static_image/about_us_bg.jpg',
            'news_banner'           => 'static_image/news_event_blk.jpg',
            'projects_banner'       => 'static_image/projects_blk.jpg',
            'volunteer_banner'      => 'static_image/Volunteer_blk.png',
            'gallery_banner'        => 'static_image/gallery_blk.jpg',
            'origin_banner'         => 'static_image/news_event_blk.jpg',
            'policy_banner'         => 'static_image/news_event_blk.jpg',
            'strategic_plan_banner' => 'static_image/news_event_blk.jpg',
            'publication_banner'    => 'static_image/news_event_blk.jpg',
            'youtube_banner'        => 'static_image/news_event_blk.jpg',
            'mission_vision_bg'     => 'static_image/mission-vision_bg.jpg',
            'impact_bg'             => 'img/map.png',
        ];

        $updateData = [];
        $copied = []; // track already-copied source files to avoid duplicates

        foreach ($imageMap as $column => $srcRelative) {
            $srcFull = public_path($srcRelative);
            if (!file_exists($srcFull)) {
                continue;
            }

            // Build a unique dest filename: column_name + original extension
            $ext = pathinfo($srcRelative, PATHINFO_EXTENSION);
            $destName = $column . '.' . $ext;

            // Only copy if not already copied (same source may map to multiple columns)
            if (!isset($copied[$srcRelative])) {
                // For shared source files, each column gets its own copy
            }
            @copy($srcFull, $dest . '/' . $destName);
            $updateData[$column] = $destName;
        }

        if (!empty($updateData)) {
            $app = DB::table('applications')->first();
            if ($app) {
                DB::table('applications')->where('id', $app->id)->update($updateData);
            } else {
                DB::table('applications')->insert(array_merge(['id' => 1], $updateData));
            }
        }
    }

    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn([
                'career_hero_banner', 'about_us_banner', 'contact_banner', 'donate_banner',
                'faq_banner', 'mission_vision_banner', 'key_focus_banner', 'governance_banner',
                'management_banner', 'organogram_banner', 'news_banner', 'projects_banner',
                'volunteer_banner', 'gallery_banner', 'origin_banner', 'policy_banner',
                'strategic_plan_banner', 'publication_banner', 'youtube_banner',
                'mission_vision_bg', 'impact_bg',
            ]);
        });
    }
};
