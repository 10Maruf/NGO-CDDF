<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\YoutubeVideo;
use App\Services\NotificationService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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

        NotificationService::newSubscriber($request->email);

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

    // Governance Level
    public function governanceLevel(){
        $gc = DB::table('org_members')->where('is_active', 1)->where('org_type', 'general_council')->orderBy('order')->get();
        $ec = DB::table('org_members')->where('is_active', 1)->where('org_type', 'executive_committee')->orderBy('order')->get();
        $ac = DB::table('org_members')->where('is_active', 1)->where('org_type', 'advisory_council')->orderBy('order')->get();
        return view('frontend.governance_level', compact('gc', 'ec', 'ac'));
    }

    // Management Level
    public function managementLevel(){
        $ed      = DB::table('org_members')->where('is_active', 1)->where('org_type', 'executive_director')->orderBy('order')->get();
        $smt     = DB::table('org_members')->where('is_active', 1)->where('org_type', 'senior_management')->orderBy('order')->get();
        $mid     = DB::table('org_members')->where('is_active', 1)->where('org_type', 'mid_management')->orderBy('order')->get();
        $field   = DB::table('org_members')->where('is_active', 1)->where('org_type', 'field_staff')->orderBy('order')->get();
        $support = DB::table('org_members')->where('is_active', 1)->where('org_type', 'support_staff')->orderBy('order')->get();
        return view('frontend.management_level', compact('ed', 'smt', 'mid', 'field', 'support'));
    }

    // Organogram
    public function organogram(){
        return view('frontend.organogram');
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
                    'description' => 'CDDF mainly focuses on women empowerment, eradicating the gender Based Violence in community level, sub-distrit, district and national level.  CDDF undertakes initiatives that empower the destitute and neglected portion of women who are deprived from rights and to ensure equal rights and opportunities for them. CDDF  works on acclerating the women dignity and eqaul opportunity. CDDF sensitizes the government and non-government institutions for strengthening the socio-economic status of women, and ensuring the full enforcement of such arrangement though training and advocacy. It also sensitizes and influences the different level of stakeholders (policy makers, local government representatives, media, communities and religious leaders) on GVB. CDDF provides the income generation training to the women for the socio-economic empowerment.',
                    'icon_class' => null,
                    'icon_path' => null,
                    'image_path' => null,
                    'default_image' => 'img/key_area/power.png',
                ],
                (object)[
                    'title' => 'Community Empowerment',
                    'description' => 'CDDF believes Community empowerment is only possible when everyone’s voices are heard. Women’s voices, particularly those living in poverty, are often unheard. Women often have the least power in communities, usually not knowing their rights or how to realize them, meaning the potential of half the population is not realized. As a result, CDDF Providing people, especially women living in poverty, with the tools to claim entitlements, develop leadership and take collective action through community-level organizations. In parallel, equipping local governments to be more accountable and responsive, creating violence-free enabling environments for women through realizing their potential, and increasing access to information and services. CDDF works on strengthening women-led community based organizations to uphold voices and realize their rights. Awareness for prevention and action to address violence, particularly against women and children. At the same time, though increasing access to the the information, CDDF creating sustainable impact as institutions become more accountable and pro-poor through ensuring access of the community to information.',
                    'icon_class' => null,
                    'icon_path' => null,
                    'image_path' => null,
                    'default_image' => 'img/key_area/women.png',
                ],
                (object)[
                    'title' => 'Livelihood',
                    'description' => 'CDDF is playing influential role in the development sectors for bringing a sustainable livelihoods and social changes of the women.  CDDF try to  Improve the livelihoods, income and food security of extremely poor women, children and men living on the norther Baangladesh particularly the  island char. CDDF  provide technical skills training, grants or interest-free loans to procure a viable market asset or start a business. Promoting agricultural farming, disaster preparedness, livelihood security, access to finance and micro-enterprise as means of income. CDDF works  for the market linkage.',
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
        $project       = Project::with(['partners','focusAreas','galleryImages'])->findOrFail($id);
        $galleryImages = $project->galleryImages;
        return view('frontend.project_view', compact('project', 'galleryImages'));
    }

    //__Latest News All__//
    public function news_all(){
        $category = request('category'); // 'news', 'event', or null for all
        $query = DB::table('latest_news')->where('status', 1)->orderBy('id', 'desc');
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
            'g-recaptcha-response' => 'required',
        ]);

        // Verify reCAPTCHA v3 with Google
        $recaptchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => config('services.recaptcha.secret_key'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);
        $recaptchaData = $recaptchaResponse->json();
        if (!$recaptchaData['success'] || ($recaptchaData['score'] ?? 1) < 0.5) {
            return redirect()->back()->withInput()->withErrors(['g-recaptcha-response' => 'reCAPTCHA verification failed. Please try again.']);
        }

        $photoName = null;
        if ($photo = $request->file('photo')) {
            $photoName = rand(10000, 99999) . 'vol.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/volunteers'), $photoName);
        }

        $volunteer = \App\Models\VolunteerApplication::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'photo'   => $photoName,
            'address' => $request->address,
            'skills'  => $request->skills,
            'message' => $request->message,
            'status'  => 'pending',
        ]);

        NotificationService::newVolunteer($request->name, $volunteer->id);

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
            'g-recaptcha-response' => 'required',
        ]);

        // Verify reCAPTCHA with Google
        $recaptchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => config('services.recaptcha.secret_key'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);
        $recaptchaData = $recaptchaResponse->json();
        if (!$recaptchaData['success'] || ($recaptchaData['score'] ?? 1) < 0.5) {
            return redirect()->back()->withInput()->withErrors(['g-recaptcha-response' => 'reCAPTCHA verification failed. Please try again.']);
        }

        $donation = \App\Models\Donation::create([
            'donor_name' => $request->donor_name,
            'donor_phone' => $request->donor_phone,
            'transaction_id' => $request->transaction_id,
            'amount' => $request->amount,
            'payment_method_id' => $request->payment_method_id,
            'status' => 'pending',
        ]);

        NotificationService::newDonation($request->donor_name, $request->amount, $donation->id);

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
            'message' => 'required',
            'g-recaptcha-response' => 'required',
        ]);

        // Verify reCAPTCHA with Google
        $recaptchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => config('services.recaptcha.secret_key'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);
        $recaptchaData = $recaptchaResponse->json();
        if (!$recaptchaData['success'] || ($recaptchaData['score'] ?? 1) < 0.5) {
            return redirect()->back()->withInput()->withErrors(['g-recaptcha-response' => 'reCAPTCHA verification failed. Please try again.']);
        }

        $message = array([
            'name' => $request->name,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => now(),
        ]);

        DB::table('messages')->insert($message);

        NotificationService::newMessage($request->name);

        return redirect()->back()->with('success','Successfully Submitted Your Message.');
    }

    //__All Photos
    public function all_photos(){
        // Each source: newest first (id DESC), limited pool → then shuffle within recents
        $eventCovers = DB::table('latest_news')
            ->where('status', 1)
            ->where('category', 'event')
            ->whereNotNull('image')->where('image', '!=', '')
            ->orderBy('id', 'desc')->limit(40)
            ->select('title', 'image', DB::raw("'images/news/' as folder"))
            ->get();

        $eventGallery = DB::table('latest_news_images')
            ->join('latest_news', 'latest_news_images.news_id', '=', 'latest_news.id')
            ->where('latest_news.status', 1)
            ->where('latest_news.category', 'event')
            ->whereNotNull('latest_news_images.image')->where('latest_news_images.image', '!=', '')
            ->orderBy('latest_news_images.id', 'desc')->limit(40)
            ->select('latest_news.title', 'latest_news_images.image', DB::raw("'images/news/' as folder"))
            ->get();

        $newsCovers = DB::table('latest_news')
            ->where('status', 1)
            ->where('category', 'news')
            ->whereNotNull('image')->where('image', '!=', '')
            ->orderBy('id', 'desc')->limit(40)
            ->select('title', 'image', DB::raw("'images/news/' as folder"))
            ->get();

        $newsGallery = DB::table('latest_news_images')
            ->join('latest_news', 'latest_news_images.news_id', '=', 'latest_news.id')
            ->where('latest_news.status', 1)
            ->where('latest_news.category', 'news')
            ->whereNotNull('latest_news_images.image')->where('latest_news_images.image', '!=', '')
            ->orderBy('latest_news_images.id', 'desc')->limit(40)
            ->select('latest_news.title', 'latest_news_images.image', DB::raw("'images/news/' as folder"))
            ->get();

        $projectCovers = DB::table('projects')
            ->whereNotNull('cover_image')->where('cover_image', '!=', '')
            ->orderBy('id', 'desc')->limit(40)
            ->select('title', 'cover_image as image', DB::raw("'images/project/' as folder"))
            ->get();

        $projectGallery = DB::table('project_images')
            ->join('projects', 'project_images.project_id', '=', 'projects.id')
            ->whereNotNull('project_images.image')->where('project_images.image', '!=', '')
            ->orderBy('project_images.id', 'desc')->limit(40)
            ->select('projects.title', 'project_images.image', DB::raw("'images/project/' as folder"))
            ->get();

        // Merge recent pools, shuffle within them, take 50-60
        $all = $eventCovers->merge($eventGallery)->merge($newsCovers)->merge($newsGallery)->merge($projectCovers)->merge($projectGallery)->shuffle();
        $take = min($all->count(), rand(50, 60));
        $photos = $all->take($take);

        return view('frontend.photos_all', compact('photos'));
    }

    // FAQ
    public function faq(){
        $faqs = DB::table('faq')->orderBy('order', 'asc')->get();
        return view('frontend.faq', compact('faqs'));
    }
}
