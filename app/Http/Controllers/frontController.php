<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frontController extends Controller
{
    // about us
    public function about_us(){
        $about_us = DB::table('about_us')->first();
        return view('frontend.about_us',compact('about_us'));
    }

    // Subscribe
    public function subscribe(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:subscribe|max:255',
        ]);

        $subscribe = array([
            'name' => $request->name,
            'email' => $request->email
        ]);

        DB::table('subscribe')->insert($subscribe);
        return redirect()->back()->with('success','Thanks for Subscribed us!!!!');
    }

    // vision and mission
    public function vision_mission(){
        $mission_vision = DB::table('mission_vision')->first();
        return view('frontend.mission_vision',compact('mission_vision'));
    }

    // team members
    public function teamMembers(){
        $team = DB::table('team_members')->orderBy('order', 'asc')->get();
        return view('frontend.team_members', compact('team'));
    }

    // origin and legal affilation
    public function origin_affilation(){
        $affilation = DB::table('legal_affilation')->get();
        return view('frontend.origin_affilation',compact('affilation'));
    }

    // executive committee
    public function committee(){
        $committee = DB::table('executive_committee')->orderBy('order', 'asc')->get();
        return view('frontend.exe_committee', compact('committee'));
    }

    // Message form Cheif Executive
    public function cheif_msg(){
        $message = DB::table('chief_executive_message')->first();
        return view('frontend.cheif_message', compact('message'));
    }

    // Partner and Donor
    public function partner(){
        $partners = DB::table('partners')->get();
        return view('frontend.partner',compact('partners'));
    }

    // impact
    public function impact(){
        $impact = DB::table('impact')->orderBy('order', 'asc')->get();
        return view('frontend.impact', compact('impact'));
    }

    // Key Focus Area
    public function key_focus(){
        return view('frontend.key_focus');
    }

    // Project Archieve
    public function proj_archieve(){
        $project = DB::table('projects')->get();
        return view('frontend.project_archieve',compact('project'));
    }

    // Ongoing Project
    public function ongoing_project(){
        $project = DB::table('ongoing_project')->paginate(15);
        return view('frontend.ongoing_project',compact('project'));
    }

    //__ongoing Project view__//
    public function project_view($id){
        $project = DB::table('ongoing_project')->where('id',$id)->first();
        return view('frontend.project_view',compact('project'));
    }

    //__Latest News All__//
    public function news_all(){
        $news = DB::table('latest_news')->paginate(15);
        return view('frontend.news_all',compact('news'));
    }

    // Youtube
    public function youtube(){
        return view('frontend.youtube');
    }

    // Programs
    public function programs(){
        $programs = DB::table('programs')->orderBy('id', 'desc')->get();
        return view('frontend.programs', compact('programs'));
    }

    // Program View
    public function programsView($id){
        $program = DB::table('programs')->where('id', $id)->first();
        return view('frontend.featured_prog_view', compact('program'));
    }

    // Stories
    public function stories(){
        $stories = DB::table('stories')->orderBy('id', 'desc')->get();
        return view('frontend.stories', compact('stories'));
    }

    // Story View
    public function storiesView($id){
        $story = DB::table('stories')->where('id', $id)->first();
        return view('frontend.story_view', compact('story'));
    }

    //__Latest News view__//
    public function news_view($id){
        $news = DB::table('latest_news')->where('id',$id)->first();
        return view('frontend.news_view',compact('news'));
    }

    // Events Calender
    public function calender(){
        return view('frontend.calender');
    }

    // Strategic Plan
    public function strategic_plan(){
        return view('frontend.strategic_plan');
    }

    // Policy Guideline
    public function policy_guideline(){
        $policy = DB::table('policy_guideline')->get();
        return view('frontend.policy_guideline',compact('policy'));
    }

    // Publication
    public function publication(){
        return view('frontend.publication');
    }

    // Get Involved
    public function career(){
        $career = DB::table('invoked')->get();
        return view('frontend.career',compact('career'));
    }

    // Volunteer Opportunities
    public function volOpportunities(){
        $volunteers = DB::table('volunteers')->where('status', 'open')->orderBy('id', 'desc')->get();
        return view('frontend.volunteer_opportunities', compact('volunteers'));
    }

    // Donate
    public function donate(){
        return view('frontend.donate');
    }

    // Fundraising
    public function fundraising(){
        return view('frontend.fundraising');
    }

    // Corporate Partnership
    public function corporate(){
        return view('frontend.corporate_partner');
    }

    // Get Contact
    public function contact(){
        $head_office = DB::table('contacts')->where('type', 'head_office')->where('status', 'active')->first();
        $branches = DB::table('contacts')->where('type', 'branch')->where('status', 'active')->get();
        $persons = DB::table('contacts')->where('type', 'person')->where('status', 'active')->get();
        return view('frontend.contact', compact('head_office', 'branches', 'persons'));
    }

    // Message Store
    public function messageStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $message = array([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        DB::table('messages')->insert($message);
        return redirect()->back()->with('success','Successfully Submitted Your Message.');
    }

    //__All Photos
    public function all_photos(){
        $photos = DB::table('gallery')->paginate('30');
        return view('frontend.photos_all',compact('photos'));
    }

    // FAQ
    public function faq(){
        $faqs = DB::table('faq')->orderBy('order', 'asc')->get();
        return view('frontend.faq', compact('faqs'));
    }
}
