<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{ url('/') }}">
            <img src="{{ asset('admin_assets/images/brand/logo.png') }}" style='height:4rem'
                class="header-brand-img desktop-lgo" alt="Admin logo">
            <img src="{{ asset('admin_assets/images/brand/logo.png') }}" class="header-brand-img dark-logo"
                alt="Admin logo">
            <img src="{{ URL::asset('admin_assets/images/brand/favicon.png') }}" class="header-brand-img mobile-logo"
                alt="Admin logo">
            <img src="{{ URL::asset('admin_assets/images/brand/favicon.png') }}"
                class="header-brand-img darkmobile-logo" alt="Admin logo">
        </a>
    </div>
    <style>
        @media (min-width: 767px) {
            .sidebar-mini.sidenav-toggled .app-sidebar {
                max-height: 100%;
            }
        }
    </style>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="{{ URL::asset('admin_assets/images/users/avatar.png') }}" alt="user-img"
                    class="avatar-xl rounded-circle mb-1">
            </div>
            {{-- <div class="user-info">
                <h5 class=" mb-1">{{ Auth::guard('web')->user()->firstname ?? '' }}
                    {{ Auth::guard('web')->user()->lastname ?? '' }} <i
                        class="ion-checkmark-circled  text-success fs-12"></i></h5>
                <span class="text-muted app-sidebar__user-name text-sm"></span>
            </div> --}}
        </div>
    </div>

    <ul class="side-menu app-sidebar3">
        <li class="side-item side-item-category mt-4">Main</li>

        <li class="slide">
            <a class="side-menu__item" href="{{ url('/employe/home') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                </svg>
                <span class="side-menu__label">Home</span>
            </a>
        </li>
        @if (Auth::user()->status != 0)
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/employe/profile') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                        width="24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                    <span class="side-menu__label">Profil</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/employe/company') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                        width="24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                    <span class="side-menu__label">Company</span>
                </a>
            </li>
        @endif
    </ul>
</aside>
