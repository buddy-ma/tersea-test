@extends('employe.layouts.master')
@section('css')
@endsection

@section('content')
    <div class="container text-center" style="padding: 100px 0">
        <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_gckvznnm.json" mode="bounce"
            background="transparent" speed="0.5" style="width: 300px; height: 300px;margin: auto;display: block;" loop
            autoplay></lottie-player>
        <h1>Welcome to employe side</h1>
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">×</button>
                <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>{{ $message }}.
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">×</button>
                <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>{{ $message }}.
            </div>
        @endif
    </div>
@endsection
@section('js')
    <!--INTERNAL Peitychart js-->
    <script src="{{ URL::asset('admin_assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/peitychart/peitychart.init.js') }}"></script>

    <!--INTERNAL Apexchart js-->
    <script src="{{ URL::asset('admin_assets/js/apexcharts.js') }}"></script>

    <!--INTERNAL ECharts js-->
    <script src="{{ URL::asset('admin_assets/plugins/echarts/echarts.js') }}"></script>

    <!--INTERNAL Chart js -->
    <script src="{{ URL::asset('admin_assets/plugins/chart/chart.bundle.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/chart/utils.js') }}"></script>

    <!-- INTERNAL Select2 js -->
    <script src="{{ URL::asset('admin_assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/js/select2.js') }}"></script>

    <!--INTERNAL Moment js-->
    <script src="{{ URL::asset('admin_assets/plugins/moment/moment.js') }}"></script>

    <!--INTERNAL Index js-->
    <script src="{{ URL::asset('admin_assets/js/index1.js') }}"></script>
@endsection
