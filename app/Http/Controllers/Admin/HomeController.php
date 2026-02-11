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
            'volunteers_count' => DB::table('volunteers')->count(),
            'volunteers_active' => DB::table('volunteers')->where('status', 'open')->count(),
            'projects_count' => DB::table('ongoing_project')->count(),
            'subscribers_count' => DB::table('subscribe')->count(),
            'messages_count' => DB::table('messages')->count(),
            'publications_count' => DB::table('publications')->count(),
            'news_count' => DB::table('latest_news')->count(),
            'stories_count' => DB::table('stories')->count(),
            'programs_count' => DB::table('programs')->count(),
            'partners_count' => DB::table('partners')->count(),
            'team_members_count' => DB::table('team_members')->count(),
            'focus_areas_count' => DB::table('focus_areas')->count(),
            'gallery_count' => DB::table('gallery')->count(),
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

        $recentVolunteers = DB::table('volunteers')
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

        // Donations by Payment Method for pie chart
        $donationsByMethod = DB::table('payment_methods')
            ->leftJoin('donations', 'payment_methods.id', '=', 'donations.payment_method_id')
            ->select('payment_methods.type as name', DB::raw('COUNT(donations.id) as count'))
            ->groupBy('payment_methods.id', 'payment_methods.type')
            ->get();

        return view('admin.home', compact(
            'stats',
            'recentDonations',
            'pendingDonations',
            'recentVolunteers',
            'recentMessages',
            'donationsByMonth',
            'donationsByMethod'
        ));
    }
}
