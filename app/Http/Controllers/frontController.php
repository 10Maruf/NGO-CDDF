<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\YoutubeVideo;
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

    // Organogram / Organizational Structure
    public function committee(){
        $orgMembers = DB::table('org_members')
            ->where('is_active', true)
            ->orderBy('order', 'asc')
            ->get()
            ->groupBy('org_type');

        return view('frontend.exe_committee', compact('orgMembers'));
    }

    // Message form Cheif Executive
    public function cheif_msg(){
        $message = DB::table('chief_executive_message')->orderBy('id', 'desc')->first();
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

    // Focus Area Detail
    public function focusAreaDetail($id){
        $area = DB::table('focus_areas')->where('id', $id)->where('is_active', 1)->firstOrFail();
        $relatedProjects = \App\Models\Project::with('focusAreas')
            ->active()
            ->whereHas('focusAreas', fn($q) => $q->where('focus_areas.id', $id))
            ->orderBy('order')
            ->get();
        return view('frontend.focus_area_detail', compact('area', 'relatedProjects'));
    }

    // Key Focus Area
    public function key_focus(){
        $focus_areas = collect();

        try {
            $focus_areas = DB::table('focus_areas')
                ->where('is_active', 1)
                ->orderBy('order', 'asc')
                ->orderBy('id', 'asc')
                ->get();
        } catch (\Throwable $e) {
            // If migration isn't run yet, fall back to defaults.
        }

        if ($focus_areas->isEmpty()) {
            $focus_areas = collect([
                (object)[
                    'title' => 'Women Empowerment',
                    'description' => 'AFAD mainly focuses on women empowerment, eradicating the gender Based Violence in community level, sub-distrit, district and national level.  AFAD undertakes initiatives that empower the destitute and neglected portion of women who are deprived from rights and to ensure equal rights and opportunities for them. AFAD  works on acclerating the women dignity and eqaul opportunity. AFAD sensitizes the government and non-government institutions for strengthening the socio-economic status of women, and ensuring the full enforcement of such arrangement though training and advocacy. It also sensitizes and influences the different level of stakeholders (policy makers, local government representatives, media, communities and religious leaders) on GVB. AFAD provides the income generation training to the women for the socio-economic empowerment.',
                    'icon_class' => null,
                    'icon_path' => null,
                    'image_path' => null,
                    'default_image' => 'img/key_area/power.png',
                ],
                (object)[
                    'title' => 'Community Empowerment',
                    'description' => 'AFAD believes Community empowerment is only possible when everyone’s voices are heard. Women’s voices, particularly those living in poverty, are often unheard. Women often have the least power in communities, usually not knowing their rights or how to realize them, meaning the potential of half the population is not realized. As a result, AFAD Providing people, especially women living in poverty, with the tools to claim entitlements, develop leadership and take collective action through community-level organizations. In parallel, equipping local governments to be more accountable and responsive, creating violence-free enabling environments for women through realizing their potential, and increasing access to information and services. AFAD works on strengthening women-led community based organizations to uphold voices and realize their rights. Awareness for prevention and action to address violence, particularly against women and children. At the same time, though increasing access to the the information, AFAD creating sustainable impact as institutions become more accountable and pro-poor through ensuring access of the community to information.',
                    'icon_class' => null,
                    'icon_path' => null,
                    'image_path' => null,
                    'default_image' => 'img/key_area/women.png',
                ],
                (object)[
                    'title' => 'Livelihood',
                    'description' => 'AFAD is playing influential role in the development sectors for bringing a sustainable livelihoods and social changes of the women.  AFAD try to  Improve the livelihoods, income and food security of extremely poor women, children and men living on the norther Baangladesh particularly the  island char. AFAD  provide technical skills training, grants or interest-free loans to procure a viable market asset or start a business. Promoting agricultural farming, disaster preparedness, livelihood security, access to finance and micro-enterprise as means of income. AFAD works  for the market linkage.',
                    'icon_class' => null,
                    'icon_path' => null,
                    'image_path' => null,
                    'default_image' => 'img/key_area/livelihood.png',
                ],
                (object)[
                    'title' => 'Social Protection',
                    'description' => 'Ensure access to health, education and employment opportunities, through community mobilization and linkages with government services, social safety net programs and emergency relief during crises.',
                    'icon_class' => null,
                    'icon_path' => null,
                    'image_path' => null,
                    'default_image' => 'img/key_area/social.png',
                ],
            ]);
        }

        return view('frontend.key_focus', compact('focus_areas'));
    }

    // Project Archive (completed projects)
    public function proj_archieve(){
        $project = Project::active()->completed()->orderBy('order')->orderByDesc('created_at')->get();
        return view('frontend.project_archieve', compact('project'));
    }

    // Ongoing Projects
    public function ongoing_project(){
        $status = request('status', 'all'); // 'all', 'ongoing', 'completed'
        
        $query = Project::with(['partners','focusAreas'])->active();
        
        if ($status === 'ongoing') {
            $query->ongoing();
        } elseif ($status === 'completed') {
            $query->completed();
        }
        
        $project = $query->orderBy('order')->orderByDesc('created_at')->paginate(12);
        
        return view('frontend.ongoing_project', compact('project', 'status'));
    }

    // Project Detail View
    public function project_view($id){
        $project = Project::with(['partners','focusAreas'])->findOrFail($id);
        return view('frontend.project_view', compact('project'));
    }

    //__Latest News All__//
    public function news_all(){
        $category = request('category'); // 'news', 'event', or null for all
        $query = DB::table('latest_news')->orderBy('id', 'desc');
        if ($category && in_array($category, ['news', 'event'])) {
            $query->where('category', $category);
        }
        $news = $query->paginate(9);
        return view('frontend.news_all', compact('news', 'category'));
    }

    // Youtube
    public function youtube(){
        $videos = YoutubeVideo::orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        return view('frontend.youtube', compact('videos'));
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
        $news          = DB::table('latest_news')->where('id', $id)->first();
        $galleryImages = DB::table('latest_news_images')->where('news_id', $id)->get();
        return view('frontend.news_view', compact('news', 'galleryImages'));
    }

    // Events Calender
    public function calender(){
        return view('frontend.calender');
    }

    // Strategic Plan
    public function strategic_plan(){
        $strategicPlans = DB::table('strategic_plans')->orderBy('created_at', 'desc')->get();
        return view('frontend.strategic_plan', compact('strategicPlans'));
    }

    // Policy Guideline
    public function policy_guideline(){
        $policy = DB::table('policy_guideline')->get();
        return view('frontend.policy_guideline',compact('policy'));
    }

    // Publication
    public function publication(){
        $publications = DB::table('publications')->orderBy('created_at', 'desc')->get();
        return view('frontend.publication', compact('publications'));
    }

    // Get Involved
    public function career(){
        $career = DB::table('careers')->orderBy('created_at', 'desc')->get();
        return view('frontend.career',compact('career'));
    }

    // Volunteers
    public function volOpportunities(){
        $volunteers = \App\Models\VolunteerApplication::where('status', 'approved')->orderBy('id', 'desc')->get();
        return view('frontend.volunteer_opportunities', compact('volunteers'));
    }

    // Volunteer Application Submit
    public function volunteerApplyStore(Request $request){
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $photoName = null;
        if ($photo = $request->file('photo')) {
            $photoName = rand(10000, 99999) . 'vol.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/volunteers'), $photoName);
        }

        \App\Models\VolunteerApplication::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'photo'   => $photoName,
            'address' => $request->address,
            'skills'  => $request->skills,
            'message' => $request->message,
            'status'  => 'pending',
        ]);

        return redirect()->back()->with('apply_success', 'Your application has been submitted! We will get back to you soon.');
    }

    // Donate
    public function donate(){
        $paymentMethods = \App\Models\PaymentMethod::active()->get();
        return view('frontend.donate', compact('paymentMethods'));
    }

    // Donation Submit
    public function donationSubmit(Request $request){
        $validatedData = $request->validate([
            'donor_name' => 'required|string|max:255',
            'donor_phone' => 'required|string|max:20',
            'transaction_id' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'payment_method_id' => 'required|exists:payment_methods,id',
        ]);

        \App\Models\Donation::create([
            'donor_name' => $request->donor_name,
            'donor_phone' => $request->donor_phone,
            'transaction_id' => $request->transaction_id,
            'amount' => $request->amount,
            'payment_method_id' => $request->payment_method_id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Thank you for your donation! We will verify it soon.');
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
            'contact_number' => 'nullable|string|max:20',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $message = array([
            'name' => $request->name,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        DB::table('messages')->insert($message);
        return redirect()->back()->with('success','Successfully Submitted Your Message.');
    }

    //__All Photos
    public function all_photos(){
        $photos = DB::table('gallery')->orderBy('id', 'desc')->paginate(30);
        return view('frontend.photos_all',compact('photos'));
    }

    // FAQ
    public function faq(){
        $faqs = DB::table('faq')->orderBy('order', 'asc')->get();
        return view('frontend.faq', compact('faqs'));
    }
}
