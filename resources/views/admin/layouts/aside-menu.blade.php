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
            <div class="user-info">
                <h5 class=" mb-1">{{ Auth::guard('web')->user()->firstname ?? '' }}
                    {{ Auth::guard('web')->user()->lastname ?? '' }} <i
                        class="ion-checkmark-circled  text-success fs-12"></i></h5>
                <span class="text-muted app-sidebar__user-name text-sm"></span>
            </div>
        </div>
    </div>
    <ul class="side-menu app-sidebar3">
        <li class="side-item side-item-category mt-4">Main</li>
        <li class="slide">
            <a class="side-menu__item" href="{{ url('/admin/dashboard') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                </svg>
                <span class="side-menu__label">Dashboard</span></a>
        </li>

        <li class="slide mt-3">
            <a class="side-menu__item" data-toggle="slide">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                    height="24" viewBox="0 0 24 24" width="24">
                    <path d="M0,0h24v24H0V0z" fill="none" />
                    <path
                        d="M4,18v-0.65c0-0.34,0.16-0.66,0.41-0.81C6.1,15.53,8.03,15,10,15c0.03,0,0.05,0,0.08,0.01c0.1-0.7,0.3-1.37,0.59-1.98 C10.45,13.01,10.23,13,10,13c-2.42,0-4.68,0.67-6.61,1.82C2.51,15.34,2,16.32,2,17.35V20h9.26c-0.42-0.6-0.75-1.28-0.97-2H4z" />
                    <path
                        d="M10,12c2.21,0,4-1.79,4-4s-1.79-4-4-4C7.79,4,6,5.79,6,8S7.79,12,10,12z M10,6c1.1,0,2,0.9,2,2s-0.9,2-2,2 c-1.1,0-2-0.9-2-2S8.9,6,10,6z" />
                    <path
                        d="M20.75,16c0-0.22-0.03-0.42-0.06-0.63l1.14-1.01l-1-1.73l-1.45,0.49c-0.32-0.27-0.68-0.24-1.08-0.63L18,11h-2l-0.3,1.49 c-0.4,0.15-0.76,0.36-1.08,0.63l-1.45-0.49l-1,1.73l1.14,1.01c-0.03,0.21-0.06,0.41-0.06,0.63s0.03,0.42,0.06,0.63l-1.14,1.01 l1,1.73l1.45-0.49c0.32,0.27,0.68,0.24,1.08,0.63L16,21h2l0.3-1.49c0.4-0.15,0.76-0.36,1.08-0.63l1.45,0.49l1-1.73l-1.14-1.01 C20.72,16.42,20.75,16.22,20.75,16z M17,18c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S18.1,18,17,18z" />
                </svg>
                <span class="side-menu__label">Admins</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li>
                    <a class="slide-item" href="{{ url('/admin/admins') }}">All Admins</a>
                </li>
                <li>
                    <a class="slide-item" href="{{ url('/admin/admins/add') }}">Add Admin</a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
