<!DOCTYPE html>
<html lang="en" id="demo">

@include('layouts.shared/head', ['title' => $title])

<body class="ltr main-body leftmenu">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">

    </div>
    <!-- End Loader -->


    <!-- Page -->
    <div class="page">

        <!-- Main Header-->
        <div class="main-header side-header sticky">
            <div class="main-container container-fluid">
                <div class="main-header-left">
                    <a class="main-header-menu-icon" href="javascript:void(0)" id="mainSidebarToggle"><span></span></a>
                    <div class="hor-logo">
                        <a class="main-logo" href="index.html">
                            <img src="../assets/img/brand/logo.png" class="header-brand-img desktop-logo"
                                alt="logo">
                            <img src="../assets/img/brand/logo-light.png" class="header-brand-img desktop-logo-dark"
                                alt="logo">
                        </a>
                    </div>
                </div>
                {{--  <div class="main-header-center">
                    <div class="responsive-logo">
                        <a href="index.html"><img src="../assets/img/brand/logo.png" class="mobile-logo"
                                alt="logo"></a>
                        <a href="index.html"><img src="../assets/img/brand/logo-light.png" class="mobile-logo-dark"
                                alt="logo"></a>
                    </div>
                    <div class="input-group">
                        <div class="input-group-btn search-panel">
                            <select class="form-control select2">
                                <option label="All categories">
                                </option>
                                <option value="IT Projects">
                                    IT Projects
                                </option>
                                <option value="Business Case">
                                    Business Case
                                </option>
                                <option value="Microsoft Project">
                                    Microsoft Project
                                </option>
                                <option value="Risk Management">
                                    Risk Management
                                </option>
                                <option value="Team Building">
                                    Team Building
                                </option>
                            </select>
                        </div>
                        <input type="search" class="form-control rounded-0" placeholder="Search for anything...">
                        <button class="btn search-btn"><i class="fe fe-search"></i></button>
                    </div>
                </div> --}}
                <div class="main-header-right">
                    <button class="navbar-toggler navresponsive-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                    </button><!-- Navresponsive closed -->
                    <div
                        class="navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                            <div class="d-flex order-lg-2 ms-auto">
                                <!-- Search -->
                                {{--  <div class="dropdown header-search">
                                    <a class="nav-link icon header-search">
                                        <i class="fe fe-search header-icons"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="main-form-search p-2">
                                            <div class="input-group">
                                                <div class="input-group-btn search-panel">
                                                    <select class="form-control select2">
                                                        <option label="All categories">
                                                        </option>
                                                        <option value="IT Projects">
                                                            IT Projects
                                                        </option>
                                                        <option value="Business Case">
                                                            Business Case
                                                        </option>
                                                        <option value="Microsoft Project">
                                                            Microsoft Project
                                                        </option>
                                                        <option value="Risk Management">
                                                            Risk Management
                                                        </option>
                                                        <option value="Team Building">
                                                            Team Building
                                                        </option>
                                                    </select>
                                                </div>
                                                <input type="search" class="form-control"
                                                    placeholder="Search for anything...">
                                                <button class="btn search-btn"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="20" height="20" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-search">
                                                        <circle cx="11" cy="11" r="8">
                                                        </circle>
                                                        <line x1="21" y1="21" x2="16.65"
                                                            y2="16.65"></line>
                                                    </svg></button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- Search -->
                                <!-- Theme-Layout -->
                                <div class="dropdown d-flex main-header-theme">
                                    <a class="nav-link icon layout-setting">
                                        <span class="dark-layout">
                                            <i class="fe fe-sun header-icons"></i>
                                        </span>
                                        <span class="light-layout">
                                            <i class="fe fe-moon header-icons"></i>
                                        </span>
                                    </a>
                                </div>
                                <!-- Theme-Layout -->
                                <!-- country -->
                                {{--    <div class="dropdown main-header-notification flag-dropdown">
                                    <a class="nav-link icon country-Flag">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <circle cx="256" cy="256" r="256" fill="#f0f0f0" />
                                            <g fill="#0052b4">
                                                <path
                                                    d="M52.92 100.142c-20.109 26.163-35.272 56.318-44.101 89.077h133.178L52.92 100.142zM503.181 189.219c-8.829-32.758-23.993-62.913-44.101-89.076l-89.075 89.076h133.176zM8.819 322.784c8.83 32.758 23.993 62.913 44.101 89.075l89.074-89.075H8.819zM411.858 52.921c-26.163-20.109-56.317-35.272-89.076-44.102v133.177l89.076-89.075zM100.142 459.079c26.163 20.109 56.318 35.272 89.076 44.102V370.005l-89.076 89.074zM189.217 8.819c-32.758 8.83-62.913 23.993-89.075 44.101l89.075 89.075V8.819zM322.783 503.181c32.758-8.83 62.913-23.993 89.075-44.101l-89.075-89.075v133.176zM370.005 322.784l89.075 89.076c20.108-26.162 35.272-56.318 44.101-89.076H370.005z" />
                                            </g>
                                            <g fill="#d80027">
                                                <path
                                                    d="M509.833 222.609H289.392V2.167A258.556 258.556 0 00256 0c-11.319 0-22.461.744-33.391 2.167v220.441H2.167A258.556 258.556 0 000 256c0 11.319.744 22.461 2.167 33.391h220.441v220.442a258.35 258.35 0 0066.783 0V289.392h220.442A258.533 258.533 0 00512 256c0-11.317-.744-22.461-2.167-33.391z" />
                                                <path
                                                    d="M322.783 322.784L437.019 437.02a256.636 256.636 0 0015.048-16.435l-97.802-97.802h-31.482v.001zM189.217 322.784h-.002L74.98 437.019a256.636 256.636 0 0016.435 15.048l97.802-97.804v-31.479zM189.217 189.219v-.002L74.981 74.98a256.636 256.636 0 00-15.048 16.435l97.803 97.803h31.481zM322.783 189.219L437.02 74.981a256.328 256.328 0 00-16.435-15.047l-97.802 97.803v31.482z" />
                                            </g>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="javascript:void(0)" class="dropdown-item d-flex ">
                                            <span class="avatar  me-3 align-self-center bg-transparent"><img
                                                    src="../assets/img/flags/french_flag.jpg" alt="img"></span>
                                            <div class="d-flex">
                                                <span class="mt-2">French</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="dropdown-item d-flex">
                                            <span class="avatar  me-3 align-self-center bg-transparent"><img
                                                    src="../assets/img/flags/germany_flag.jpg" alt="img"></span>
                                            <div class="d-flex">
                                                <span class="mt-2">Germany</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="dropdown-item d-flex">
                                            <span class="avatar me-3 align-self-center bg-transparent"><img
                                                    src="../assets/img/flags/italy_flag.jpg" alt="img"></span>
                                            <div class="d-flex">
                                                <span class="mt-2">Italy</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="dropdown-item d-flex">
                                            <span class="avatar me-3 align-self-center bg-transparent"><img
                                                    src="../assets/img/flags/russia_flag.jpg" alt="img"></span>
                                            <div class="d-flex">
                                                <span class="mt-2">Russia</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="dropdown-item d-flex">
                                            <span class="avatar  me-3 align-self-center bg-transparent"><img
                                                    src="../assets/img/flags/spain_flag.jpg" alt="img"></span>
                                            <div class="d-flex">
                                                <span class="mt-2">spain</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!-- country -->
                                <!-- Full screen -->
                                <div class="dropdown ">
                                    <a class="nav-link icon full-screen-link">
                                        <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                                        <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                                    </a>
                                </div>
                                <!-- Full screen -->
                                <!-- Notification -->
                                <div class="dropdown main-header-notification">
                                    <a class="nav-link icon" href="">
                                        <i class="fe fe-bell header-icons"></i>
                                        <span class="badge bg-danger nav-link-badge">4</span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="header-navheading">
                                            <p class="main-notification-text">You have 1 unread notification<span
                                                    class="badge bg-pill bg-primary ms-3">View all</span></p>
                                        </div>
                                        <div class="main-notification-list">
                                            <div class="media new">
                                                <div class="main-img-user online"><img alt="avatar"
                                                        src="../assets/img/users/5.jpg"></div>
                                                <div class="media-body">
                                                    <p>Congratulate <strong>Olivia James</strong> for New template
                                                        start</p>
                                                    <span>Oct 15 12:32pm</span>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="main-img-user"><img alt="avatar"
                                                        src="../assets/img/users/2.jpg">
                                                </div>
                                                <div class="media-body">
                                                    <p><strong>Joshua Gray</strong> New Message Received</p>
                                                    <span>Oct 13
                                                        02:56am</span>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="main-img-user online"><img alt="avatar"
                                                        src="../assets/img/users/3.jpg"></div>
                                                <div class="media-body">
                                                    <p><strong>Elizabeth Lewis</strong> added new schedule realease
                                                    </p><span>Oct
                                                        12 10:40pm</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-footer">
                                            <a href="javascript:void(0)">View All Notifications</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Notification -->
                                <!-- Messages -->
                                <div class="main-header-notification">
                                    <a class="nav-link icon" href="chat.html">
                                        <i class="fe fe-message-square header-icons"></i>
                                        <span class="badge bg-success nav-link-badge">6</span>
                                    </a>
                                </div> --}}
                                <!-- Messages -->
                                <!-- Profile -->
                                <div class="dropdown main-profile-menu">
                                    <a class="d-flex" href="javascript:void(0)">
                                        <span class="main-img-user"><img alt="avatar"
                                                src="../assets/img/users/1.jpg"></span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="header-navheading">
                                            <h6 class="main-notification-title">Sonia Taylor</h6>
                                            <p class="main-notification-text">Web Designer</p>
                                        </div>
                                        <a class="dropdown-item border-top" href="profile.html">
                                            <i class="fe fe-user"></i> My Profile
                                        </a>
                                        <a class="dropdown-item" href="profile.html">
                                            <i class="fe fe-edit"></i> Edit Profile
                                        </a>
                                        <a class="dropdown-item" href="profile.html">
                                            <i class="fe fe-settings"></i> Account Settings
                                        </a>
                                        <a class="dropdown-item" href="profile.html">
                                            <i class="fe fe-settings"></i> Support
                                        </a>
                                        <a class="dropdown-item" href="profile.html">
                                            <i class="fe fe-compass"></i> Activity
                                        </a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                            <i class="fe fe-power"></i> Sign Out
                                        </a>
                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </div>
                                </div>
                                <!-- Profile -->
                                <!-- Sidebar -->
                                {{--  <div class="dropdown  header-settings">
                                    <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="sidebar-right"
                                        data-bs-target=".sidebar-right">
                                        <i class="fe fe-align-right header-icons"></i>
                                    </a>
                                </div> --}}
                                <!-- Sidebar -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Header-->

        <!-- Sidemenu -->
        <div class="sticky">
            <div class="main-menu main-sidebar main-sidebar-sticky side-menu">
                <div class="main-sidebar-header main-container-1 active">
                    <div class="sidemenu-logo">
                        <a class="main-logo" href="{{ route('dashboard') }}">
                            <img src="../assets/img/brand/logo-light.png" class="header-brand-img desktop-logo"
                                alt="logo">
                            <img src="../assets/img/brand/icon-light.png" class="header-brand-img icon-logo"
                                alt="logo">
                            <img src="../assets/img/brand/logo.png" class="header-brand-img desktop-logo theme-logo"
                                alt="logo">
                            <img src="../assets/img/brand/icon.png" class="header-brand-img icon-logo theme-logo"
                                alt="logo">
                        </a>
                    </div>
                    @include('layouts.shared.menu')
                </div>
            </div>
        </div>
        <!-- End Sidemenu -->

        <!-- Main Content-->
        <div class="main-content side-content pt-0">

            <div class="main-container container-fluid">
                <div class="inner-body">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div>
                            @yield('breadcrumb')
                            {{--  <h2 class="main-content-title tx-24 mg-b-5">Welcome To Dashboard</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Project Dashboard</li>
                            </ol> --}}
                        </div>
                        <div class="d-flex">
                            <div class="justify-content-center">
                                @yield('topbutton')
                                {{--   <button type="button" class="btn btn-white btn-icon-text my-2 me-2">
                                    <i class="fe fe-download me-2"></i> Import
                                </button>
                                <button type="button" class="btn btn-white btn-icon-text my-2 me-2">
                                    <i class="fe fe-filter me-2"></i> Filter
                                </button>
                                <button type="button" class="btn btn-primary my-2 btn-icon-text">
                                    <i class="fe fe-download-cloud me-2"></i> Download Report
                                </button> --}}
                            </div>
                        </div>
                    </div>
                    <!-- End Page Header -->

                    <!--Row-->
                    <div class="row row-sm">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            @yield('content')
                        </div>
                    </div><!-- Row end -->
                </div>
            </div>
        </div>
        <!-- End Main Content-->

        <!-- Main Footer-->
        <div class="main-footer text-center">
            <div class="container">
                <div class="row row-sm">
                    <div class="col-md-12">
                        <span>Copyright © @php echo  date('Y'); @endphp <a href="javascript:void(0)">Sahej</a> All rights
                            reserved.</span>
                    </div>
                </div>
            </div>
        </div>
        <!--End Footer-->

        <!-- Sidebar -->
        {{--   <div class="sidebar sidebar-right sidebar-animate">
            <div class="sidebar-icon">
                <a href="javascript:void(0)" class="text-end float-end text-dark fs-20"
                    data-bs-toggle="sidebar-right" data-bs-target=".sidebar-right"><i class="fe fe-x"></i></a>
            </div>
            <div class="sidebar-body">
                <h5>Todo</h5>
                <div class="d-flex p-3">
                    <label class="ckbox"><input checked type="checkbox"><span>Hangout With friends</span></label>
                    <span class="ms-auto">
                        <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Edit"></i>
                        <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Delete"></i>
                    </span>
                </div>
                <div class="d-flex p-3 border-top">
                    <label class="ckbox"><input type="checkbox"><span>Prepare for presentation</span></label>
                    <span class="ms-auto">
                        <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Edit"></i>
                        <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Delete"></i>
                    </span>
                </div>
                <div class="d-flex p-3 border-top">
                    <label class="ckbox"><input type="checkbox"><span>Prepare for presentation</span></label>
                    <span class="ms-auto">
                        <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Edit"></i>
                        <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Delete"></i>
                    </span>
                </div>
                <div class="d-flex p-3 border-top">
                    <label class="ckbox"><input checked type="checkbox"><span>System Updated</span></label>
                    <span class="ms-auto">
                        <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Edit"></i>
                        <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Delete"></i>
                    </span>
                </div>
                <div class="d-flex p-3 border-top">
                    <label class="ckbox"><input type="checkbox"><span>Do something more</span></label>
                    <span class="ms-auto">
                        <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Edit"></i>
                        <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Delete"></i>
                    </span>
                </div>
                <div class="d-flex p-3 border-top">
                    <label class="ckbox"><input type="checkbox"><span>System Updated</span></label>
                    <span class="ms-auto">
                        <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Edit"></i>
                        <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Delete"></i>
                    </span>
                </div>
                <div class="d-flex p-3 border-top">
                    <label class="ckbox"><input type="checkbox"><span>Find an Idea</span></label>
                    <span class="ms-auto">
                        <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Edit"></i>
                        <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Delete"></i>
                    </span>
                </div>
                <div class="d-flex p-3 border-top mb-0">
                    <label class="ckbox"><input type="checkbox"><span>Project review</span></label>
                    <span class="ms-auto">
                        <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Edit"></i>
                        <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title=""
                            data-bs-placement="top" data-bs-original-title="Delete"></i>
                    </span>
                </div>
                <h5>Overview</h5>
                <div class="p-4">
                    <div class="main-traffic-detail-item">
                        <div>
                            <span>Founder &amp; CEO</span> <span>24</span>
                        </div>
                        <div class="progress">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="20"
                                class="progress-bar progress-bar-xs wd-20p" role="progressbar"></div>
                        </div><!-- progress -->
                    </div>
                    <div class="main-traffic-detail-item">
                        <div>
                            <span>UX Designer</span> <span>1</span>
                        </div>
                        <div class="progress">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="15"
                                class="progress-bar progress-bar-xs bg-secondary wd-15p" role="progressbar"></div>
                        </div><!-- progress -->
                    </div>
                    <div class="main-traffic-detail-item">
                        <div>
                            <span>Recruitment</span> <span>87</span>
                        </div>
                        <div class="progress">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="45"
                                class="progress-bar progress-bar-xs bg-success wd-45p" role="progressbar"></div>
                        </div><!-- progress -->
                    </div>
                    <div class="main-traffic-detail-item">
                        <div>
                            <span>Software Engineer</span> <span>32</span>
                        </div>
                        <div class="progress">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25"
                                class="progress-bar progress-bar-xs bg-info wd-25p" role="progressbar"></div>
                        </div><!-- progress -->
                    </div>
                    <div class="main-traffic-detail-item">
                        <div>
                            <span>Project Manager</span> <span>32</span>
                        </div>
                        <div class="progress">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25"
                                class="progress-bar progress-bar-xs bg-danger wd-25p" role="progressbar"></div>
                        </div><!-- progress -->
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- End Sidebar -->

    </div>
    <!-- End Page -->

    <!-- Back-to-top -->
    <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>
    @include('layouts.shared.footer_script')
    <script>
        @if (Session::has('success'))
            notif({
                type: "success",
                msg: "{{ session('success') }}",
                position: "right",
                bottom: '10'
            });
        @elseif (Session::has('error'))
            notif({
                type: "error",
                msg: "{{ session('error') }}",
                position: "right",
                bottom: '10'
            });
        @endif
    </script>
    @yield('script')


</body>

</html>
