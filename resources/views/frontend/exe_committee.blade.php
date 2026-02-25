@extends('main')

@section('content')

  <!-- Breadcrumbs -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>About CDDF</li>
      </ol>
      <h2>Organizational Structure</h2>
    </div>
  </section>

  <section class="bg-light py-5">
    <div class="container" data-aos="fade-up">

      {{-- Section Title --}}
      <div class="section-title text-center mb-4">
        <h2>Governance Structure &amp; Organogram of CDDF</h2>
        <p class="text-muted">
          The general body comprises of 21 renowned women rights activists. The Executive Committee (EC) consists of
          07 women members. The Chief Executive is responsible to the EC and thereby the General Body.
        </p>
        <a href="{{ asset('frontend/file/AFAD_Organogram.pdf') }}" target="_blank"
           class="btn btn-primary border border-dark mt-2"
           style="font-size:16px; font-weight:500; box-shadow: 4px 4px 0 rgba(0,0,0,1);">
          <i class="fa-solid fa-cloud-arrow-down me-1"></i> Download Organogram PDF
        </a>
      </div>

      {{-- ===================== VISUAL ORGANOGRAM CHART ===================== --}}
      <div id="organogram" class="card shadow-sm mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="card-body py-4">
          <h5 class="text-center fw-bold text-primary mb-4">Organizational Chart</h5>
          <div class="org-chart-wrapper">

            {{-- GOVERNANCE LEVEL --}}
            <div id="governance-level" class="org-level-label text-primary fw-bold text-center mb-2">GOVERNANCE LEVEL</div>
            <div class="org-row">
              <div class="org-box org-governance">
                <span class="badge-count">{{ isset($orgMembers['general_council']) ? count($orgMembers['general_council']) : 21 }}</span>
                General Committee (GC)
              </div>
            </div>
            <div class="org-connector"></div>
            <div class="org-row">
              <div class="org-box org-executive">
                <span class="badge-count">{{ isset($orgMembers['executive_committee']) ? count($orgMembers['executive_committee']) : 7 }}</span>
                Executive Committee (EC)
              </div>
            </div>
            <div class="org-connector"></div>
            <div class="org-row">
              <div class="org-box org-advisory">
                <span class="badge-count">{{ isset($orgMembers['advisory_council']) ? count($orgMembers['advisory_council']) : 3 }}</span>
                Advisory Council
              </div>
            </div>

            <div class="org-gap"></div>

            {{-- MANAGEMENT LEVEL --}}
            <div id="management-level" class="org-level-label text-success fw-bold text-center mb-2">MANAGEMENT LEVEL</div>
            <div class="org-row">
              <div class="org-box org-ed">
                Executive Director (ED)
                <small class="d-block text-muted" style="font-size:11px;">Head of Organization</small>
              </div>
            </div>

            <div class="org-gap"></div>

            {{-- SMT --}}
            <div class="org-level-label text-warning fw-bold text-center mb-2">SENIOR MANAGEMENT TEAM (SMT)</div>
            <div class="org-row org-row-multi">
              <div class="org-box-sm org-smt">Director – Program</div>
              <div class="org-box-sm org-smt">Director – Finance</div>
              <div class="org-box-sm org-smt">Director – HR &amp; Admin</div>
              <div class="org-box-sm org-smt">Director – Communication &amp; Resource Mobilization</div>
              <div class="org-box-sm org-smt">Director – RME</div>
              <div class="org-box-sm org-smt">Director – Special Program</div>
            </div>

            <div class="org-gap"></div>

            {{-- MID-LEVEL --}}
            <div class="org-level-label text-secondary fw-bold text-center mb-2">MID-LEVEL MANAGEMENT</div>
            <div class="org-row org-row-multi">
              <div class="org-box-sm org-mid">Regional Manager – Sofol Program</div>
              <div class="org-box-sm org-mid">Manager – Project (District/Upazila)</div>
              <div class="org-box-sm org-mid">Manager – Finance &amp; Admin</div>
              <div class="org-box-sm org-mid">Manager – Training &amp; Research Center</div>
            </div>

            <div class="org-gap"></div>

            {{-- FIELD & FRONTLINE --}}
            <div class="org-level-label text-dark fw-bold text-center mb-2">FIELD &amp; FRONTLINE STAFF</div>
            <div class="org-row">
              <div class="org-box-full org-field">
                Field Officer &nbsp;|&nbsp; Field Facilitator &nbsp;|&nbsp; Community Mobilizer &nbsp;|&nbsp; Community Volunteer &nbsp;|&nbsp; Teacher
              </div>
            </div>

            <div class="org-gap"></div>

            {{-- SUPPORT STAFF --}}
            <div class="org-level-label text-muted fw-bold text-center mb-2">SUPPORT STAFF</div>
            <div class="org-row">
              <div class="org-box-full org-support">
                Office Assistant &nbsp;|&nbsp; Guard &nbsp;|&nbsp; Driver &nbsp;|&nbsp; Cook &nbsp;|&nbsp; Other Support Staff
              </div>
            </div>

          </div>{{-- end org-chart-wrapper --}}
        </div>
      </div>

      {{-- ===================== MEMBER CARDS BY SECTION ===================== --}}
      @php
        $sections = [
          'general_council'    => ['label' => 'General Council (GC)',           'color' => '#0dcaf0', 'dark_text' => true ],
          'executive_committee'=> ['label' => 'Executive Committee (EC)',        'color' => '#0d6efd', 'dark_text' => false],
          'advisory_council'   => ['label' => 'Advisory Council',               'color' => '#ffc107', 'dark_text' => true ],
          'executive_director' => ['label' => 'Executive Director (ED)',         'color' => '#dc3545', 'dark_text' => false],
          'senior_management'  => ['label' => 'Senior Management Team (SMT)',    'color' => '#198754', 'dark_text' => false],
          'mid_management'     => ['label' => 'Mid-Level Management',            'color' => '#6c757d', 'dark_text' => false],
          'field_staff'        => ['label' => 'Field & Frontline Staff',         'color' => '#343a40', 'dark_text' => false],
          'support_staff'      => ['label' => 'Support Staff',                   'color' => '#adb5bd', 'dark_text' => true ],
        ];
      @endphp

      @foreach($sections as $type => $section)
        @if(isset($orgMembers[$type]) && count($orgMembers[$type]) > 0)
        <div class="mb-5" data-aos="fade-up">
          <div class="d-flex align-items-center gap-2 mb-3">
            <span style="width:6px; height:30px; background:{{ $section['color'] }}; border-radius:3px; display:inline-block;"></span>
            <h5 class="fw-bold mb-0">{{ $section['label'] }}</h5>
            <span class="badge ms-1 rounded-pill"
                  style="background:{{ $section['color'] }}; color:{{ $section['dark_text'] ? '#000' : '#fff' }}">
              {{ count($orgMembers[$type]) }} Members
            </span>
          </div>
          <div class="row g-3">
            @foreach($orgMembers[$type] as $member)
            @php
              $colClass = match($type) {
                'field_staff', 'support_staff' => 'col-6 col-md-4 col-lg-2',
                'executive_director' => 'col-12 col-md-6 col-lg-4 mx-auto',
                default => 'col-6 col-md-4 col-lg-3',
              };
            @endphp
            <div class="{{ $colClass }}">
              <div class="card h-100 border-0 shadow-sm text-center overflow-hidden"
                   style="border-top: 4px solid {{ $section['color'] }} !important;">
                <div class="pt-3 px-2">
                  <img src="{{ asset('images/org_members/'.$member->photo) }}"
                       onerror="this.src='{{ asset('img/testimonial.jpg') }}'"
                       alt="{{ $member->name }}"
                       class="rounded-circle"
                       style="width:80px; height:80px; object-fit:cover; border: 3px solid {{ $section['color'] }};">
                </div>
                <div class="card-body py-2 px-2">
                  <h6 class="fw-bold mb-0" style="font-size:13px;">{{ $member->name }}</h6>
                  <p class="text-muted mb-1" style="font-size:11px;">{{ $member->designation }}</p>

                  @if($member->bio)
                    <p class="text-muted mt-1 mb-0" style="font-size:11px;">{{ Str::limit($member->bio, 80) }}</p>
                  @endif
                  @if($member->facebook || $member->twitter || $member->instagram || $member->youtube)
                  <div class="mt-2">
                    @if($member->facebook)
                      <a href="{{ $member->facebook }}" target="_blank" class="btn btn-sm btn-outline-primary p-1" style="font-size:11px;"><i class="bx bxl-facebook"></i></a>
                    @endif
                    @if($member->twitter)
                      <a href="{{ $member->twitter }}" target="_blank" class="btn btn-sm btn-outline-info p-1" style="font-size:11px;"><i class="bx bxl-twitter"></i></a>
                    @endif
                    @if($member->instagram)
                      <a href="{{ $member->instagram }}" target="_blank" class="btn btn-sm btn-outline-danger p-1" style="font-size:11px;"><i class="bx bxl-instagram"></i></a>
                    @endif
                    @if($member->youtube)
                      <a href="{{ $member->youtube }}" target="_blank" class="btn btn-sm btn-outline-danger p-1" style="font-size:11px;"><i class="bx bxl-youtube"></i></a>
                    @endif
                    @if($member->linkedin)
                      <a href="{{ $member->linkedin }}" target="_blank" class="btn btn-sm btn-outline-primary p-1" style="font-size:11px;"><i class="bx bxl-linkedin"></i></a>
                    @endif
                  </div>
                  @endif
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @endif
      @endforeach

    </div>
  </section>

@if(isset($scrollTarget))
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var target = document.getElementById('{{ $scrollTarget }}');
    if (target) {
      setTimeout(function() {
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }, 300);
    }
  });
</script>
@endif

{{-- Organogram Chart CSS --}}
<style>
.org-chart-wrapper { max-width: 860px; margin: 0 auto; }
.org-level-label { font-size:12px; letter-spacing:1px; text-transform:uppercase; }
.org-row { display:flex; justify-content:center; margin-bottom:0; }
.org-row-multi { flex-wrap:wrap; gap:6px; }
.org-box {
  display:flex; align-items:center; justify-content:center; text-align:center;
  padding:10px 24px; border-radius:8px; font-weight:600; font-size:14px;
  min-width:220px; box-shadow:0 2px 8px rgba(0,0,0,0.08);
}
.org-box-sm {
  display:flex; align-items:center; justify-content:center; text-align:center;
  padding:8px 12px; border-radius:6px; font-size:12px; font-weight:500;
  min-width:120px; box-shadow:0 1px 4px rgba(0,0,0,0.08);
}
.org-box-full {
  width:100%; text-align:center; padding:10px 16px; border-radius:8px;
  font-size:13px; font-weight:500; box-shadow:0 1px 4px rgba(0,0,0,0.08);
}
.badge-count {
  background:rgba(0,0,0,0.15); border-radius:50px; font-size:11px;
  padding:2px 8px; margin-right:8px; font-weight:700;
}
.org-governance { background:#cff4fc; color:#055160; border:2px solid #0dcaf0; }
.org-executive  { background:#cfe2ff; color:#084298; border:2px solid #0d6efd; }
.org-advisory   { background:#fff3cd; color:#664d03; border:2px solid #ffc107; }
.org-ed         { background:#f8d7da; color:#842029; border:2px solid #dc3545; min-width:260px; }
.org-smt        { background:#d1e7dd; color:#0f5132; border:1px solid #198754; }
.org-mid        { background:#e2e3e5; color:#383d41; border:1px solid #6c757d; }
.org-field      { background:#d3d3d3; color:#1a1a1a; border:1px solid #343a40; }
.org-support    { background:#f8f9fa; color:#495057; border:1px dashed #adb5bd; }
.org-connector  { width:2px; height:24px; background:#6c757d; margin:0 auto; }
.org-gap        { height:28px; }
</style>

@endsection
