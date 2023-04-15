@extends('employe.layouts.master')
@section('css')
@endsection
@section('page-header')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Home</h4>
        </div>
    </div>
@endsection
@section('content')
    <div class="container text-center" style="padding: 100px 0">
        <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_gckvznnm.json" mode="bounce"
            background="transparent" speed="0.5" style="width: 300px; height: 300px;margin: auto;display: block;" loop
            autoplay></lottie-player>
        <h1>You are still disabled</h1>
        <p>Wait for the admin to approve you</p>
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
