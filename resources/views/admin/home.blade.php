@extends('layouts.admin')

@section('title_l1', 'Dashboard')
@section('bread_crumb')
    <li class="breadcrumb-item">Dashboard</li>
@endsection

@section('content')

<div class="row">
    <!-- Statistics Cards Row 1 -->
    <div class="col-xxl-3 col-md-6">
        <div class="card card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-3">
                    <h5 class="fs-4">৳{{ number_format($stats['donations_amount'], 2) }}</h5>
                    <span class="text-muted">Total Verified</span>
                </div>
                <div class="avatar-text avatar-lg bg-primary text-white rounded">
                    <span class="fs-3 fw-bold">৳</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xxl-3 col-md-6">
        <div class="card card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-3">
                    <h5 class="fs-4">৳{{ number_format($stats['pending_donations_amount'], 2) }}</h5>
                    <span class="text-muted">Pending Donations</span>
                </div>
                <div class="avatar-text avatar-lg bg-warning text-white rounded">
                    <i class="feather-clock"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xxl-3 col-md-6">
        <div class="card card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-3">
                    <h5 class="fs-4">{{ $stats['projects_count'] }}</h5>
                    <span class="text-muted">Ongoing Projects</span>
                </div>
                <div class="avatar-text avatar-lg bg-info text-white rounded">
                    <i class="feather-briefcase"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xxl-3 col-md-6">
        <div class="card card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-3">
                    <h5 class="fs-4">{{ $stats['volunteers_active'] }}</h5>
                    <span class="text-muted">Active Volunteers</span>
                </div>
                <div class="avatar-text avatar-lg bg-success text-white rounded">
                    <i class="feather-users"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards Row 2 -->
    <div class="col-xxl-2 col-lg-4 col-md-6">
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="fs-12 fw-medium text-muted mb-3">Subscribers</div>
                <div class="hstack justify-content-between lh-base">
                    <h3><span class="counter">{{ $stats['subscribers_count'] }}</span></h3>
                    <div class="hstack gap-2 fs-11 text-info">
                        <i class="feather-mail fs-12"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-2 col-lg-4 col-md-6">
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="fs-12 fw-medium text-muted mb-3">Publications</div>
                <div class="hstack justify-content-between lh-base">
                    <h3><span class="counter">{{ $stats['publications_count'] }}</span></h3>
                    <div class="hstack gap-2 fs-11 text-primary">
                        <i class="feather-book-open fs-12"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-2 col-lg-4 col-md-6">
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="fs-12 fw-medium text-muted mb-3">Latest News</div>
                <div class="hstack justify-content-between lh-base">
                    <h3><span class="counter">{{ $stats['news_count'] }}</span></h3>
                    <div class="hstack gap-2 fs-11 text-success">
                        <i class="feather-file-text fs-12"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-2 col-lg-4 col-md-6">
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="fs-12 fw-medium text-muted mb-3">Success Stories</div>
                <div class="hstack justify-content-between lh-base">
                    <h3><span class="counter">{{ $stats['stories_count'] }}</span></h3>
                    <div class="hstack gap-2 fs-11 text-warning">
                        <i class="feather-award fs-12"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-2 col-lg-4 col-md-6">
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="fs-12 fw-medium text-muted mb-3">Programs</div>
                <div class="hstack justify-content-between lh-base">
                    <h3><span class="counter">{{ $stats['programs_count'] }}</span></h3>
                    <div class="hstack gap-2 fs-11 text-danger">
                        <i class="feather-target fs-12"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-2 col-lg-4 col-md-6">
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="fs-12 fw-medium text-muted mb-3">Gallery Photos</div>
                <div class="hstack justify-content-between lh-base">
                    <h3><span class="counter">{{ $stats['gallery_count'] }}</span></h3>
                    <div class="hstack gap-2 fs-11 text-teal">
                        <i class="feather-image fs-12"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="col-xxl-8">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Donation Trends (Last 6 Months)</h5>
            </div>
            <div class="card-body">
                <div id="donationTrendChart"></div>
            </div>
        </div>
    </div>

    <div class="col-xxl-4">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Donations by Method</h5>
            </div>
            <div class="card-body">
                <div id="donationsMethodChart"></div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="col-xxl-4">
        <div class="card stretch stretch-full border-warning">
            <div class="card-header">
                <h5 class="card-title text-warning">Pending Donations</h5>
                <a href="{{ route('admin.donations.index', ['status' => 'pending']) }}" class="btn btn-sm btn-light-brand">Review All</a>
            </div>
            <div class="card-body">
                @forelse($pendingDonations as $donation)
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex gap-3 align-items-center">
                        <div class="avatar-text avatar-md bg-soft-warning text-warning">
                            <i class="feather-clock"></i>
                        </div>
                        <div>
                            <a href="{{ route('admin.donations.show', $donation->id) }}" class="font-body fw-bold d-block mb-1">{{ $donation->donor_name ?? 'Anonymous' }}</a>
                            <p class="fs-11 text-muted mb-0">৳{{ number_format($donation->amount, 2) }}</p>
                        </div>
                    </div>
                    <span class="badge bg-soft-warning text-warning">{{ \Carbon\Carbon::parse($donation->created_at)->diffForHumans() }}</span>
                </div>
                @empty
                <p class="text-muted text-center py-4">No pending donations</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-xxl-4">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Recent Verified Donations</h5>
                <a href="{{ route('admin.donations.index') }}" class="btn btn-sm btn-light-brand">View All</a>
            </div>
            <div class="card-body">
                @forelse($recentDonations as $donation)
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex gap-3 align-items-center">
                        <div class="avatar-text avatar-md bg-soft-primary text-primary">
                            <span class="fs-5 fw-bold">৳</span>
                        </div>
                        <div>
                            <a href="javascript:void(0);" class="font-body fw-bold d-block mb-1">{{ $donation->donor_name ?? 'Anonymous' }}</a>
                            <p class="fs-11 text-muted mb-0">৳{{ number_format($donation->amount, 2) }}</p>
                        </div>
                    </div>
                    <span class="badge bg-soft-success text-success">{{ \Carbon\Carbon::parse($donation->created_at)->diffForHumans() }}</span>
                </div>
                @empty
                <p class="text-muted text-center py-4">No donations yet</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-xxl-4">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Recent Volunteer Opportunities</h5>
                <a href="{{ route('volunteers.index') }}" class="btn btn-sm btn-light-brand">View All</a>
            </div>
            <div class="card-body">
                @forelse($recentVolunteers as $volunteer)
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex gap-3 align-items-center">
                        <div class="avatar-text avatar-md bg-soft-success text-success">
                            <i class="feather-user"></i>
                        </div>
                        <div>
                            <a href="javascript:void(0);" class="font-body fw-bold d-block mb-1">{{ $volunteer->title }}</a>
                            <p class="fs-11 text-muted mb-0">{{ Str::limit($volunteer->description, 30) }}</p>
                        </div>
                    </div>
                    <span class="badge bg-soft-{{ $volunteer->status == 'open' ? 'success' : 'danger' }} text-{{ $volunteer->status == 'open' ? 'success' : 'danger' }}">{{ ucfirst($volunteer->status) }}</span>
                </div>
                @empty
                <p class="text-muted text-center py-4">No volunteer opportunities yet</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-xxl-4">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Recent Messages</h5>
                <a href="{{ route('message.index') }}" class="btn btn-sm btn-light-brand">View All</a>
            </div>
            <div class="card-body">
                @forelse($recentMessages as $message)
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex gap-3 align-items-center">
                        <div class="avatar-text avatar-md bg-soft-danger text-danger">
                            <i class="feather-mail"></i>
                        </div>
                        <div>
                            <a href="javascript:void(0);" class="font-body fw-bold d-block mb-1">{{ Str::limit($message->name, 20) }}</a>
                            <p class="fs-11 text-muted mb-0">{{ Str::limit($message->subject ?? $message->message, 30) }}</p>
                        </div>
                    </div>
                    <span class="badge bg-soft-info text-info">ID: {{ $message->id }}</span>
                </div>
                @empty
                <p class="text-muted text-center py-4">No messages yet</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-12">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('donate') }}" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>Add Donation
                    </a>
                    <a href="{{ route('project.add') }}" class="btn btn-success">
                        <i class="feather-plus me-2"></i>Add Project
                    </a>
                    <a href="{{ route('news.add') }}" class="btn btn-info">
                        <i class="feather-plus me-2"></i>Add News
                    </a>
                    <a href="{{ route('stories.add') }}" class="btn btn-warning">
                        <i class="feather-plus me-2"></i>Add Story
                    </a>
                    <a href="{{ route('publications.add') }}" class="btn btn-secondary">
                        <i class="feather-plus me-2"></i>Add Publication
                    </a>
                    <a href="{{ route('strategic_plans.create') }}" class="btn btn-dark">
                        <i class="feather-plus me-2"></i>Add Strategic Plan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Prepare data for charts
    const donationMonths = @json($donationsByMonth->pluck('month'));
    const donationCounts = @json($donationsByMonth->pluck('count'));
    const donationAmounts = @json($donationsByMonth->pluck('total'));
    
    // Donation Methods Data
    const methods = @json($donationsByMethod->pluck('name'));
    const methodCounts = @json($donationsByMethod->pluck('count'));

    // Donation Trend Chart
    const donationTrendOptions = {
        chart: {
            type: 'area',
            height: 350,
            toolbar: { show: false }
        },
        series: [{
            name: 'Donations',
            data: donationCounts
        }, {
            name: 'Amount (৳)',
            data: donationAmounts
        }],
        xaxis: {
            categories: donationMonths.map(m => {
                const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                return months[m - 1];
            })
        },
        colors: ['#3a86ff', '#06d6a0'],
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth' },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.3,
            }
        }
    };

    const donationTrendChart = new ApexCharts(document.querySelector("#donationTrendChart"), donationTrendOptions);
    donationTrendChart.render();
    
    // Donation Methods Chart
    const donationsMethodOptions = {
        series: methodCounts,
        labels: methods,
        chart: {
            type: 'donut',
            height: 350,
        },
        colors: ['#3a86ff', '#06d6a0', '#ffa400', '#ef476f', '#8338ec', '#fb5607'],
        legend: {
            position: 'bottom'
        }
    };
    
    const donationsMethodChart = new ApexCharts(document.querySelector("#donationsMethodChart"), donationsMethodOptions);
    donationsMethodChart.render();
</script>
@endpush

