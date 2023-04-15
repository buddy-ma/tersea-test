@extends('admin.layouts.master')
@section('css')
    <!--INTERNAL Select2 css -->
    <link href="{{ URL::asset('admin_assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <!-- Data table css -->
    <link href="{{ URL::asset('admin_assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('admin_assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin_assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Companies</h4>
        </div>
    </div>
@endsection
@section('content')
    <div class="row mt-3">
        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Table Companies</div>
                    <div class="float-right ml-auto">
                        <a href="{{ route('show-company-add') }}" class="btn btn-success">Add Company</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Company title</th>
                                    <th class="wd-15p border-bottom-0">Email</th>
                                    <th class="wd-15p border-bottom-0">Phone</th>
                                    <th class="wd-15p border-bottom-0">Address</th>
                                    <th class="wd-15p border-bottom-0">Nbr employes</th>
                                    <th class="wd-15p border-bottom-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{ $company->title }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->phone }}</td>
                                        <td>{{ $company->address }}</td>
                                        <td>{{ count($company->employes) }}</td>
                                        <td>
                                            <a href="{{ route('show-company', $company->id) }}"
                                                class="btn btn-success mb-2">Browse</a>
                                            <a href="{{ route('show-company-edit', $company->id) }}"
                                                class="btn btn-primary mb-2">Edit</a>
                                            @if (count($company->employes) == 0)
                                                <form action="{{ route('company-delete', [$company->id]) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf

                                                    <button type="submit" class="btn btn-danger">Disable</a>
                                                </form>
                                            @endif
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/js/datatables.js') }}"></script>
@endsection
