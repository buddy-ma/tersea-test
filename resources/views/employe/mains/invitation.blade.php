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
    <div class="row mt-3">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Join Invitation </h3>
                </div>
                <form action="{{ route('invitation-register') }}" method='POST' role="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name='company_id' value="{{ $invitation->company_id }}">
                    <div class="card-body pb-2">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert"><button type="button" class="close"
                                    data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>{{ $message }}.
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="expanel expanel-default">
                            <div class="expanel-heading">
                                <h3 class="expanel-title" style="text-align: center">Employe Information &nbsp
                                </h3>
                            </div>
                            <div class="expanel-body">
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Fullname*</label>
                                        <input class="form-control mb-4" placeholder="Fullname" required type="text"
                                            name='fullname' value='{{ old('fullname') }}'>
                                    </div>
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Email*</label>
                                        <input class="form-control mb-4" placeholder="Email" type="email" required
                                            name='email' value='{{ old('email') }}'>
                                    </div>
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Phone*</label>
                                        <input class="form-control mb-4" placeholder="Phone" type="text" required
                                            name='phone' maxlength="10" value='{{ old('phone') }}'>
                                    </div>
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Address*</label>
                                        <input class="form-control mb-4" placeholder="Address" type="text" required
                                            name='address' value='{{ old('address') }}'>
                                    </div>
                                </div>
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Date naissance*</label>
                                        <input class="form-control mb-4" placeholder="Date naissance" type="date"
                                            required name='date_naissance' value='{{ old('date_naissance') }}'>
                                    </div>
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Password*</label>
                                        <input class="form-control mb-4" placeholder="Password" type="password" required
                                            name='password' value='{{ old('password') }}'>
                                    </div>
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Confirm Password </label>
                                        <input class="form-control mb-4" placeholder="Password" type="password"
                                            name='password_confirmation'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Save" name="action" class="btn btn-primary mt-4 mb-0">
                    </div>
                </form>
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
