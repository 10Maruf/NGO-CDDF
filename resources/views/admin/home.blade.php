@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center p-3">
                    <h2 class="text-success">UMUS</h2>
                    <h6>Uddipto Mohila Unnayan Sangstha</h6>
                    <p class="text-muted small">Empowering Dalit Women & Children in Satkhira</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-success">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Programs</p>
                        <h4 class="my-1 text-success">{{ $stats['total_programs'] }}</h4>
                        <p class="mb-0 font-13">
                            <span class="text-success">{{ $stats['active_programs'] }}</span> Active
                        </p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-success text-white ms-auto">
                        <i class='bx bxs-briefcase'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-info">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Donations</p>
                        <h4 class="my-1 text-info">{{ $stats['total_donations'] }}</h4>
                        <p class="mb-0 font-13">
                            <span class="text-warning">{{ $stats['pending_donations'] }}</span> Pending
                        </p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-info text-white ms-auto">
                        <i class='bx bx-donate-heart'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Team Members</p>
                        <h4 class="my-1 text-warning">{{ $stats['total_team_members'] + $stats['total_executive_committee'] }}</h4>
                        <p class="mb-0 font-13">
                            <span class="text-success">{{ $stats['total_volunteers'] }}</span> Volunteers
                        </p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-warning text-white ms-auto">
                        <i class='bx bxs-group'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Publications</p>
                        <h4 class="my-1 text-danger">{{ $stats['total_publications'] }}</h4>
                        <p class="mb-0 font-13">
                            <span class="text-success">{{ $stats['total_stories'] }}</span> Success Stories
                        </p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-danger text-white ms-auto">
                        <i class='bx bxs-book-content'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Donation Amount Card -->
<div class="row">
    <div class="col-12 col-lg-8 col-xl-8">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Total Donation Amount (Verified)</h5>
                    </div>
                    <div class="font-22 ms-auto">
                        <i class='bx bx-money text-success'></i>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <h2 class="mb-0 text-success">৳{{ number_format($stats['total_donation_amount'], 2) }}</h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 col-lg-4 col-xl-4">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">New Contacts</h5>
                    </div>
                    <div class="font-22 ms-auto">
                        <i class='bx bx-message-dots text-info'></i>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <h2 class="mb-0 text-info">{{ $stats['total_contacts'] }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card radius-10">
            <div class="card-body">
                <h5 class="card-title">Monthly Donations (Last 6 Months)</h5>
                <div style="height: 300px; position: relative;">
                    <canvas id="donationChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 col-lg-6">
        <div class="card radius-10">
            <div class="card-body">
                <h5 class="card-title">Program Status Distribution</h5>
                <div style="height: 300px; position: relative;">
                    <canvas id="programChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activities -->
<div class="row">
    <div class="col-12 col-lg-4">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <h5 class="mb-0">Recent Donations</h5>
                    <div class="ms-auto">
                        <a href="{{ route('admin.donations.index') }}" class="btn btn-sm btn-success">View All</a>
                    </div>
                </div>
                <div class="dashboard-list">
                    @forelse($recent_donations as $donation)
                    <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                        <div class="flex-grow-1">
                            <p class="mb-0 font-13"><strong>{{ $donation->donor_name }}</strong></p>
                            <p class="mb-0 text-secondary font-12">৳{{ number_format($donation->amount, 2) }}</p>
                        </div>
                        <div>
                            <span class="badge 
                                @if($donation->status == 'verified') bg-success 
                                @elseif($donation->status == 'pending') bg-warning 
                                @else bg-danger @endif">
                                {{ ucfirst($donation->status) }}
                            </span>
                        </div>
                    </div>
                    @empty
                    <p class="text-muted text-center">No donations yet</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 col-lg-4">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <h5 class="mb-0">Recent Contacts</h5>
                    <div class="ms-auto">
                        <a href="{{ route('message.index') }}" class="btn btn-sm btn-info">View All</a>
                    </div>
                </div>
                <div class="dashboard-list">
                    @forelse($recent_contacts as $contact)
                    <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                        <div class="flex-grow-1">
                            <p class="mb-0 font-13"><strong>{{ $contact->name }}</strong></p>
                            <p class="mb-0 text-secondary font-12">{{ Str::limit($contact->message, 40) }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-muted text-center">No contacts yet</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 col-lg-4">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <h5 class="mb-0">New Volunteers</h5>
                    <div class="ms-auto">
                        <a href="{{ route('admin.volunteer_registrations.index') }}" class="btn btn-sm btn-warning">View All</a>
                    </div>
                </div>
                <div class="dashboard-list">
                    @forelse($recent_volunteers as $volunteer)
                    <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                        <div class="flex-grow-1">
                            <p class="mb-0 font-13"><strong>{{ $volunteer->name }}</strong></p>
                            <p class="mb-0 text-secondary font-12">{{ $volunteer->email }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-muted text-center">No volunteers yet</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row">
    <div class="col-12">
        <div class="card radius-10">
            <div class="card-body">
                <h5 class="card-title mb-3">Quick Actions</h5>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('strategic_plans.create') }}" class="btn btn-success">
                        <i class="bx bx-plus"></i> Add Strategic Plan
                    </a>
                    <a href="{{ route('programs.add') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Add Program
                    </a>
                    <a href="{{ route('stories.add') }}" class="btn btn-info">
                        <i class="bx bx-plus"></i> Add Success Story
                    </a>
                    <a href="{{ route('publications.add') }}" class="btn btn-warning">
                        <i class="bx bx-plus"></i> Add Publication
                    </a>
                    <a href="{{ route('team.add') }}" class="btn btn-secondary">
                        <i class="bx bx-plus"></i> Add Team Member
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
    // Monthly Donations Chart
    const donationCtx = document.getElementById('donationChart').getContext('2d');
    const monthlyData = @json($monthly_donations);
    
    const months = monthlyData.map(item => {
        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        return monthNames[item.month - 1] + ' ' + item.year;
    });
    const amounts = monthlyData.map(item => item.total || 0);
    const counts = monthlyData.map(item => item.count || 0);
    
    new Chart(donationCtx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Amount (৳)',
                data: amounts,
                backgroundColor: 'rgba(40, 167, 69, 0.7)',
                borderColor: 'rgba(40, 167, 69, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    // Program Status Chart
    const programCtx = document.getElementById('programChart').getContext('2d');
    const programData = @json($program_stats);
    
    const statusLabels = programData.map(item => {
        return item.status.charAt(0).toUpperCase() + item.status.slice(1);
    });
    const statusCounts = programData.map(item => item.count);
    
    new Chart(programCtx, {
        type: 'doughnut',
        data: {
            labels: statusLabels,
            datasets: [{
                data: statusCounts,
                backgroundColor: [
                    'rgba(40, 167, 69, 0.7)',   // Active - Green
                    'rgba(23, 162, 184, 0.7)',  // Completed - Blue
                    'rgba(255, 193, 7, 0.7)'    // Upcoming - Yellow
                ],
                borderColor: [
                    'rgba(40, 167, 69, 1)',
                    'rgba(23, 162, 184, 1)',
                    'rgba(255, 193, 7, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endpush

@endsection


