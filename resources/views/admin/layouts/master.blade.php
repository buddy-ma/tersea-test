<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="PAP - Admin" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="PAP" name="author">
    <meta name="keywords" content="admin panel PAP" />
    @include('admin.layouts.head')
    @livewireStyles
</head>

<body class="app sidebar-mini">
    <!---Global-loader-->
    <div id="global-loader">
        <img src="{{ URL::asset('admin_assets/images/svgs/loader.svg') }}" alt="loader">
    </div>
    <!--- End Global-loader-->
    <!-- Page -->
    <div class="page">
        <div class="page-main">
            @include('admin.layouts.aside-menu')
            <!-- App-Content -->
            <div class="app-content main-content">
                <div class="side-app">
                    @include('admin.layouts.header')
                    @yield('page-header')
                    @yield('content')
                </div><!-- End Page -->
            </div>
        </div>
    </div>
    @livewireScripts
    @include('admin.layouts.footer-scripts')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    @if (Session::has('message'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Good Job...',
                text: '{{ session('message') }}',
            })
        </script>
    @elseif(Session::has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            })
        </script>
    @elseif(Session::has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success...',
                text: '{{ session('success') }}',
            })
        </script>
    @endif
    <script>
        window.addEventListener('swal:modal', event => {
            new swal({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type,
            })
        });
    </script>
</body>

</html>
