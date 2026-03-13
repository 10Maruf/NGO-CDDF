<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Statistics Data
        $stats = [
            'donations_count' => DB::table('donations')->where('status', 'verified')->count(),
            'donations_amount' => DB::table('donations')->where('status', 'verified')->sum('amount') ?? 0,
            'pending_donations_count' => DB::table('donations')->where('status', 'pending')->count(),
            'pending_donations_amount' => DB::table('donations')->where('status', 'pending')->sum('amount') ?? 0,
            'volunteers_count' => DB::table('volunteer_applications')->count(),
            'volunteers_active' => DB::table('volunteer_applications')->where('status', 'approved')->count(),
            'projects_count' => DB::table('projects')->where('status', 'ongoing')->count(),
            'subscribers_count' => DB::table('subscribe')->count(),
            'org_members_count' => DB::table('org_members')->count(),
            'messages_count' => DB::table('messages')->count(),
            'publications_count' => DB::table('publications')->count(),
            'news_count' => DB::table('latest_news')->count(),
            'stories_count' => DB::table('stories')->count(),
            'programs_count' => DB::table('programs')->count(),
            'partners_count' => DB::table('partners')->count(),
            'donors_count' => DB::table('donations')->where('status', 'verified')->distinct('donor_name')->count('donor_name'),
            'team_members_count' => DB::table('team_members')->count(),
            'focus_areas_count' => DB::table('focus_areas')->count(),
            // 'gallery_count' => DB::table('gallery')->count(), // Gallery disabled — auto-generated from news/projects
        ];

        // Recent Activities
        $recentDonations = DB::table('donations')
            ->where('status', 'verified')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $pendingDonations = DB::table('donations')
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recentVolunteers = DB::table('volunteer_applications')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recentMessages = DB::table('messages')
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        // Monthly donation data for chart (last 6 months)
        $donationsByMonth = DB::table('donations')
            ->selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(*) as count, SUM(amount) as total')
            ->whereRaw('created_at >= DATE_SUB(NOW(), INTERVAL 6 MONTH)')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Org Members by Type for pie chart
        $orgMembersByType = DB::table('org_members')
            ->select('org_type as name', DB::raw('COUNT(*) as count'))
            ->where('is_active', true)
            ->groupBy('org_type')
            ->get()
            ->map(function ($item) {
                $labels = [
                    'general_council' => 'General Council',
                    'executive_committee' => 'Executive Committee',
                    'advisory_council' => 'Advisory Council',
                    'executive_director' => 'Executive Director',
                    'senior_management' => 'Senior Management',
                    'mid_management' => 'Mid Management',
                    'field_staff' => 'Field Staff',
                    'support_staff' => 'Support Staff',
                ];
                $item->name = $labels[$item->name] ?? $item->name;
                $item->count = (int) $item->count;
                return $item;
            });

        return view('admin.home', compact(
            'stats',
            'recentDonations',
            'pendingDonations',
            'recentVolunteers',
            'recentMessages',
            'donationsByMonth',
            'orgMembersByType'
        ));
    }
}
