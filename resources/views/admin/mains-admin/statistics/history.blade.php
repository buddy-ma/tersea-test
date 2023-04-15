@extends('admin.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">History</h4>
        </div>
    </div>
    <!--End Page header-->
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Activity</h3>
                </div>
                <div class="card-body">
                    <div class="latest-timeline scrollbar3" id="scrollbar3">
                        <ul class="timeline mb-0">
                            @foreach ($historique as $histo)
                                <li class="mt-0">
                                    <div class="d-flex"><span class="time-data">Task Done</span><span
                                            class="ml-auto text-muted fs-11">{{ $histo->updated_at->translatedFormat('F j, Y') }}</span>
                                    </div>
                                    <p class="text-muted fs-12"><span class="text-info">
                                            Admin {{ $histo->user->name }}</span>
                                        <a href="{{ url($histo->link) }}" class="font-weight-semibold">
                                            {{ $histo->action }}
                                        </a>
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
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
