@extends('main')

@section('title') Organizational Organogram – CDDF @endsection

@section('content')

{{-- ===== Hero / Page Banner ===== --}}
<div class="hero-wrap" style="background-image: url('{{ (isset($application->organogram_banner) && $application->organogram_banner) ? asset('images/application/'.$application->organogram_banner) : asset('static_image/about_us_bg.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 340px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.60);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size: 0.9rem;">
                    <a href="{{ url('/') }}" style="color: #ffaa6e; text-decoration: none;">Home</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <a href="{{ route('governance.level') }}" style="color: #ffaa6e; text-decoration: none;">Our Team</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">Organizational Organogram</span>
                </p>
                <h1 class="mb-0" style="color: #ffffff; font-weight: 400; font-size: 2.8rem; letter-spacing: 1px;">Organizational Organogram</h1>
                <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

{{-- ===== Organogram Content ===== --}}
<section class="py-5" style="background: #fdf6f0;">
    <div class="container" data-aos="fade-up">

        {{-- Page Title --}}
        <div class="text-center mb-2">
            <h2 class="org-main-title">Organizational Chart</h2>
            <p class="text-muted" style="font-size: 0.92rem;">Board, Executive Committee &amp; Management Structure</p>
            <a href="{{ asset('frontend/file/AFAD_Organogram.pdf') }}" target="_blank"
               class="btn btn-sm px-4 py-2 mt-1"
               style="background: #f86f2d; color: #fff; border-radius: 50px; font-size: 0.85rem; font-weight: 600; box-shadow: 0 3px 10px rgba(248,111,45,0.35);">
                <i class="fa-solid fa-cloud-arrow-down me-1"></i> Download PDF
            </a>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-lg-8 col-md-10">

                {{-- ===== GOVERNANCE LEVEL ===== --}}
                <div class="org-section-wrap">
                    <div class="org-level-badge">GOVERNANCE LEVEL</div>

                    <div class="org-tree">

                        {{-- General Committee --}}
                        <div class="org-node-wrap">
                            <div class="org-card org-card-cyan">
                                <span class="org-count">21</span>
                                <span class="org-label">General Committee (GC)</span>
                            </div>
                        </div>

                        <div class="org-connector-line"></div>

                        {{-- Executive Committee --}}
                        <div class="org-node-wrap">
                            <div class="org-card org-card-blue">
                                <span class="org-count">7</span>
                                <span class="org-label">Executive Committee (EC)</span>
                            </div>
                        </div>

                        <div class="org-connector-line"></div>

                        {{-- Advisory Council --}}
                        <div class="org-node-wrap">
                            <div class="org-card org-card-yellow">
                                <span class="org-count">3</span>
                                <span class="org-label">Advisory Council</span>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Section Gap --}}
                <div class="org-section-gap">
                    <div class="org-section-line"></div>
                </div>

                {{-- ===== MANAGEMENT LEVEL ===== --}}
                <div class="org-section-wrap">
                    <div class="org-level-badge">MANAGEMENT LEVEL</div>

                    <div class="org-tree">

                        {{-- Executive Director --}}
                        <div class="org-node-wrap">
                            <div class="org-card org-card-red">
                                <span class="org-count"><i class="fa-solid fa-user-tie" style="font-size:13px;"></i></span>
                                <span class="org-label">
                                    Executive Director (ED)
                                    <small class="d-block" style="font-size:0.78rem; font-weight:400; opacity:0.75; margin-top:2px;">Head of Organization</small>
                                </span>
                            </div>
                        </div>

                        <div class="org-connector-line"></div>

                        {{-- Senior Management Team --}}
                        <div class="org-node-wrap">
                            <div class="org-sub-label">Senior Management Team (SMT)</div>
                            <div class="org-grid-3">
                                <div class="org-grid-card org-card-green">Director &ndash; Program</div>
                                <div class="org-grid-card org-card-green">Director &ndash; Finance</div>
                                <div class="org-grid-card org-card-green">Director &ndash; HR &amp; Admin</div>
                                <div class="org-grid-card org-card-green">Director &ndash; Communication &amp; Resource Mobilization</div>
                                <div class="org-grid-card org-card-green">Director &ndash; Research, Monitoring &amp; Evaluation (RME)</div>
                                <div class="org-grid-card org-card-green">Director &ndash; Special Program</div>
                            </div>
                        </div>

                        <div class="org-connector-line"></div>

                        {{-- Mid-Level Management --}}
                        <div class="org-node-wrap">
                            <div class="org-sub-label">Mid-Level Management</div>
                            <div class="org-grid-2">
                                <div class="org-grid-card org-card-gray">Regional Manager &ndash; Sofol Program</div>
                                <div class="org-grid-card org-card-gray">Manager &ndash; Project (District/Upazila)</div>
                                <div class="org-grid-card org-card-gray">Manager &ndash; Finance &amp; Admin</div>
                                <div class="org-grid-card org-card-gray">Manager &ndash; Training &amp; Research Center</div>
                            </div>
                        </div>

                        <div class="org-connector-line"></div>

                        {{-- Field & Frontline Staff --}}
                        <div class="org-node-wrap">
                            <div class="org-sub-label">Field &amp; Frontline Staff</div>
                            <div class="org-card-full org-card-dark">
                                Field Officer &nbsp;|&nbsp; Field Facilitator &nbsp;|&nbsp; Community Mobilizer &nbsp;|&nbsp; Community Volunteer &nbsp;|&nbsp; Teacher
                            </div>
                        </div>

                        <div class="org-connector-line"></div>

                        {{-- Support Staff --}}
                        <div class="org-node-wrap">
                            <div class="org-sub-label">Support Staff</div>
                            <div class="org-card-full org-card-muted">
                                Office Assistant &nbsp;|&nbsp; Guard &nbsp;|&nbsp; Driver &nbsp;|&nbsp; Cook &nbsp;|&nbsp; Other Support Staff
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<style>
/* ---- Main Title ---- */
.org-main-title {
    font-size: 2rem;
    font-weight: 700;
    color: #f86f2d;
    letter-spacing: 0.5px;
}

/* ---- Section Wrapper ---- */
.org-section-wrap {
    background: #fff;
    border-radius: 16px;
    padding: 32px 28px 28px;
    box-shadow: 0 4px 24px rgba(248,111,45,0.10);
    border: 1px solid #fde8d8;
    margin-bottom: 0;
}

/* ---- Level Badge ---- */
.org-level-badge {
    display: inline-block;
    background: #fff3ec;
    color: #f86f2d;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 5px 18px;
    border-radius: 50px;
    border: 1.5px solid #f8c4a0;
    margin-bottom: 28px;
}

/* ---- Tree wrapper ---- */
.org-tree {
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* ---- Node wrapper ---- */
.org-node-wrap {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* ---- Connector line ---- */
.org-connector-line {
    width: 2px;
    height: 32px;
    background: #e0e0e0;
    margin: 0 auto;
}

/* ---- Section gap between governance & management ---- */
.org-section-gap {
    display: flex;
    justify-content: center;
    margin: 0;
}
.org-section-line {
    width: 2px;
    height: 40px;
    background: linear-gradient(#e0e0e0, #f8c4a0);
}

/* ---- Main org cards (single box) ---- */
.org-card {
    display: flex;
    align-items: center;
    gap: 14px;
    border-radius: 12px;
    padding: 13px 28px;
    min-width: 300px;
    max-width: 420px;
    font-weight: 600;
    font-size: 1rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.07);
    border-width: 2px;
    border-style: solid;
}
.org-count {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(0,0,0,0.10);
    font-size: 0.85rem;
    font-weight: 700;
    flex-shrink: 0;
}
.org-label { flex: 1; }

/* ---- Card colour variants ---- */
.org-card-cyan   { background: #cff4fc; color: #055160; border-color: #67d9ef; }
.org-card-blue   { background: #dce8ff; color: #1a3a8c; border-color: #7ba7f5; }
.org-card-yellow { background: #fff3cd; color: #7a5800; border-color: #f5c842; }
.org-card-red    { background: #ffe5d6; color: #c94b0a; border-color: #f8a07a; }
.org-card-orange { background: #fff0e6; color: #b85000; border-color: #f8c4a0; }

/* ---- Sub-section label ---- */
.org-sub-label {
    font-size: 0.78rem;
    font-weight: 700;
    color: #f86f2d;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 10px;
    text-align: center;
}

/* ---- Grid cards: 3-col ---- */
.org-grid-3 {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 8px;
    width: 100%;
    max-width: 680px;
}
/* ---- Grid cards: 2-col ---- */
.org-grid-2 {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 8px;
    width: 100%;
    max-width: 580px;
}

.org-grid-card {
    border-radius: 8px;
    padding: 10px 14px;
    font-size: 0.88rem;
    font-weight: 500;
    text-align: center;
    border-width: 1.5px;
    border-style: solid;
    line-height: 1.4;
}
.org-card-green { background: #d1f0e0; color: #0f5132; border-color: #6dce9e; }
.org-card-gray  { background: #f0f0f0; color: #3a3a3a; border-color: #bbb; }

/* ---- Full-width card ---- */
.org-card-full {
    border-radius: 10px;
    padding: 12px 20px;
    font-size: 0.9rem;
    font-weight: 500;
    text-align: center;
    width: 100%;
    max-width: 680px;
    border-width: 1.5px;
    border-style: solid;
    line-height: 1.7;
}
.org-card-dark  { background: #e8e8e8; color: #1a1a1a; border-color: #aaa; }
.org-card-muted { background: #f8f9fa; color: #555; border-color: #ccc; border-style: dashed; }

/* ---- Responsive ---- */
@media (max-width: 600px) {
    .org-grid-3 { grid-template-columns: 1fr 1fr; }
    .org-grid-2 { grid-template-columns: 1fr; }
    .org-card   { min-width: unset; width: 100%; }
}
</style>

@endsection
