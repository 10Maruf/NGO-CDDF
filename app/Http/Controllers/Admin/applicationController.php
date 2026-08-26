<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class applicationController extends Controller
{
    public function create(){
        $application = DB::table('applications')->first();
        return view('admin.application.add',compact('application'));
    }

    public function store(Request $request)
    {
        $application = DB::table('applications')->first();

        //main logo
        if($main_logo = $request->file('main_logo'))
        {
            $request->validate([
                'image' => ['mimes:jpeg,png,jpg', 'max:500'],
            ]);

            if(!empty($application) && file_exists(public_path('images/application/' . $application->main_logo)))
            {
                @unlink(public_path('images/application/' . $application->main_logo));
            }
            $main_logo_path = public_path('images/application');
            $main_logo_name = rand(100000, 999999)."main_logo." . $main_logo->getClientOriginalExtension();
            compress_and_save_image($main_logo, $main_logo_path, $main_logo_name);
            $main_logo_path_name = $main_logo_name;
        }
        else
        {
            if(!empty($application) && isset($application->main_logo))
            {
                $main_logo_path_name = $application->main_logo;
            }
            else
            {
                $main_logo_path_name = '';
            }

        }

        //fav icon
        if($fev_icon = $request->file('fev_icon'))
        {
            $request->validate([
                'image' => ['mimes:jpeg,png,jpg', 'max:500'],
            ]);

            if(!empty($application) && file_exists(public_path('images/application/' . $application->fav_icon)))
            {
                @unlink(public_path('images/application/' . $application->fav_icon));
            }
            $fev_icon_path = public_path('images/application');
            $fev_icon_name= rand(100000, 999999)."fev_icon." . $fev_icon->getClientOriginalExtension();
            compress_and_save_image($fev_icon, $fev_icon_path, $fev_icon_name);
            $fev_icon_path_name = $fev_icon_name;
        }
        else
        {
            if(!empty($application) && isset($application->fav_icon))
            {
                $fev_icon_path_name = $application->fav_icon;
            }
            else
            {
                $fev_icon_path_name = '';
            }

        }

        // Process all banner/background image uploads
        $bannerFields = [
            'career_hero_banner', 'about_us_banner', 'contact_banner', 'donate_banner',
            'faq_banner', 'mission_vision_banner', 'key_focus_banner', 'governance_banner',
            'management_banner', 'organogram_banner', 'news_banner', 'projects_banner',
            'volunteer_banner', 'gallery_banner', 'origin_banner', 'policy_banner',
            'strategic_plan_banner', 'publication_banner', 'youtube_banner',
            'mission_vision_bg', 'impact_bg',
        ];

        $bannerData = [];
        foreach ($bannerFields as $field) {
            if ($file = $request->file($field)) {
                $request->validate([$field => ['mimes:jpeg,png,jpg,webp', 'max:2048']]);
                if (!empty($application) && !empty($application->$field) && file_exists(public_path('images/application/' . $application->$field))) {
                    @unlink(public_path('images/application/' . $application->$field));
                }
                $fileName = rand(100000, 999999) . $field . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/application/'), $fileName);
                $bannerData[$field] = $fileName;
            } else {
                $bannerData[$field] = (!empty($application) && isset($application->$field)) ? $application->$field : '';
            }
        }

        $matchThese = ['id' => 1];
        DB::table('applications')->updateOrInsert($matchThese, array_merge([
            'main_logo' => $main_logo_path_name,
            'fav_icon' => $fev_icon_path_name,
            'facebook' => $request->fb,
            'twitter' => $request->twitter,
            'instagram' => $request->insta,
            'youtube' => $request->youtube,
        ], $bannerData));

        return redirect()->back()->with('success','Successfully Inserted Data');
    }

    

    // public function store(Request $request ){
    //     $validatedData = $request->validate([
    //         'logo' => 'required|mimes:jpg,png,jpeg,gif',
    //         'fav' => 'required|mimes:jpg,png,jpeg,gif',
    //         'fb' => 'required',
    //         'twitter' => 'required',
    //         'insta' => 'required',
    //         'youtube' => 'required',
    //     ]);

    //     $logo = '';
    //     if ($image = $request->file('logo')) {
    //         $logo = rand(10000, 99999) . "logo." . $image->getClientOriginalExtension();
    //         $image->move(public_path('images/application/'), $logo);
    //     }

    //     $favicon = '';
    //     if ($image = $request->file('fav')) {
    //         $favicon = rand(10000, 99999) . "fav." . $image->getClientOriginalExtension();
    //         $image->move(public_path('images/application/'), $favicon);
    //     }

    // $application =[
    //     'main_logo' => $logo,
    //     'fav_icon' => $favicon,
    //     'facebook' => $request->fb,
    //     'twitter' => $request->twitter,
    //     'instagram' => $request->insta,
    //     'youtube' => $request->youtube
    // ];

    // DB::table('applications')->insert($application);
    // return redirect()->back()->with('success', 'Successfully inserted data');

    // }

    // index
    public function index()
    {
        $applications = DB::table('applications')->get();
        return view('admin.application.index', compact('applications'));
    }
}
