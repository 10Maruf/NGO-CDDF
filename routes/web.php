<?php

use App\Http\Controllers\frontController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

require __DIR__.'/admin.php';
/*
|--------------------------------------------------------------------------
| Clints Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $slider = DB::table('slider')->get();
    $project = DB::table('ongoing_project')->take(3)->get();
    $news = DB::table('latest_news')->take(6)->get();
    $gallery = DB::table('gallery')->take(6)->get();
    $application = DB::table('applications')->get()->first();
    $programs = DB::table('programs')->orderBy('created_at', 'desc')->take(6)->get();
    $stories = DB::table('stories')->orderBy('id', 'desc')->get();
    $impact = DB::table('impact')->orderBy('order')->take(4)->get();

    return view('home', compact('slider', 'project', 'news', 'gallery', 'application', 'programs', 'stories', 'impact'));
});

Route::post('user/subscribe', [frontController::class, 'subscribe'])->name('user.subscribe');

// About us
Route::get('about/us', [frontController::class, 'about_us'])->name('about.us');
Route::get('mission/vision', [frontController::class, 'vision_mission'])->name('vision.mission');
Route::get('about/us/team/members', [frontController::class, 'teamMembers'])->name('team.members');
Route::get('origin/affilation', [frontController::class, 'origin_affilation'])->name('origin_affilation');
Route::get('committee', [frontController::class, 'committee'])->name('executive.committee');
Route::get('cheif/message', [frontController::class, 'cheif_msg'])->name('cheif.message');
Route::get('partner/donor', [frontController::class, 'partner'])->name('partner.donor');
Route::get('about/impact', [frontController::class, 'impact'])->name('about.impact');

// Programs
Route::get('key/focus', [frontController::class, 'key_focus'])->name('key.focus.area');
Route::get('project/archieve', [frontController::class, 'proj_archieve'])->name('project.archieve');
Route::get('ongoing/project', [frontController::class, 'ongoing_project'])->name('ongoing.project');
Route::get('ongoing/project/view/{id}', [frontController::class, 'project_view'])->name('ongoing.project.view');
Route::get('latest/news/view/{id}', [frontController::class, 'news_view'])->name('latest.news.view');
Route::get('latest/news/all', [frontController::class, 'news_all'])->name('latest.news.all');
Route::get('youtube/video', [frontController::class, 'youtube'])->name('youtube.video');
Route::get('programs', [frontController::class, 'programs'])->name('programs.all');
Route::get('programs/view/{id}', [frontController::class, 'programsView'])->name('programs.view');
Route::get('success/stories', [frontController::class, 'stories'])->name('success.stories');
Route::get('success/stories/view/{id}', [frontController::class, 'storiesView'])->name('success.stories.view');
Route::get('events/calender', [frontController::class, 'calender'])->name('events.calender');

// Stay Informed
Route::get('strategic/plan', [frontController::class, 'strategic_plan'])->name('strategic.plan');
Route::get('policy/guideline', [frontController::class, 'policy_guideline'])->name('policy.guideline');
Route::get('publication', [frontController::class, 'publication'])->name('publication');

// Involved
Route::get('get_invoked/career', [frontController::class, 'career'])->name('invoked.career');
Route::get('volunteer/opportunities', [frontController::class, 'volOpportunities'])->name('volunterr.opportunities');
Route::get('volunteer/register', [frontController::class, 'volunteerRegister'])->name('volunteer.register');
Route::post('volunteer/register/submit', [frontController::class, 'volunteerRegisterSubmit'])->name('volunteer.register.submit');
Route::get('donate', [frontController::class, 'donate'])->name('donate');
Route::post('donation/submit', [frontController::class, 'donationSubmit'])->name('donation.submit');
Route::get('fundraising', [frontController::class, 'fundraising'])->name('fundraising');
Route::get('corporate/partnership', [frontController::class, 'corporate'])->name('corporate.partnership');
Route::get('contact', [frontController::class, 'contact'])->name('contact');
Route::post('message/store', [frontController::class, 'messageStore'])->name('message.store');

// __Gallery
Route::get('gallery/all', [frontController::class, 'all_photos'])->name('photo.all');

// FAQ
Route::get('faq',[frontController::class, 'faq'])->name('faq');
