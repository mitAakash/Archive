<div class="main-sidebar-body main-body-1">
    <div class="slide-left disabled" id="slide-left"><i class="fe fe-chevron-left"></i></div>
    <ul class="menu-nav nav">
        <li class="nav-header"><span class="nav-label">Dashboard</span></li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="shape1"></span>
                <span class="shape2"></span>
                <i class="ti-home sidemenu-icon menu-icon "></i>
                <span class="sidemenu-label">Dashboard</span>
            </a>
        </li>
        <li class="nav-header"><span class="nav-label">Campaign</span></li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('campaign.index') }}">
                <span class="shape1"></span>
                <span class="shape2"></span>
                <i class="ti-home sidemenu-icon menu-icon "></i>
                <span class="sidemenu-label">Campaign</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('liveChat.index')}}">
                <span class="shape1"></span>
                <span class="shape2"></span>
                <i class="ti-menu sidemenu-icon menu-icon "></i>
                <span class="sidemenu-label">Live Chat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link with-sub" href="javascript:void(0)">
                <span class="shape1"></span>
                <span class="shape2"></span>
                <i class="ti-wallet sidemenu-icon menu-icon "></i>
                <span class="sidemenu-label">Manage

                </span>
                <i class="angle fe fe-chevron-right"></i>
            </a>
            <ul class="nav-sub">

                <li class="nav-sub-item"> <a class="nav-sub-link" href="{{ route('template.index') }}">Template</a></li>

            </ul>
        </li>
    </ul>
    <div class="slide-right" id="slide-right"><i class="fe fe-chevron-right"></i></div>
</div>
