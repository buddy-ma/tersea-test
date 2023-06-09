@extends('admin.layouts.master')
@section('css')
    <!-- INTERNAL File Uploads css -->
    <link href="{{ URL::asset('admin_assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

    <!-- INTERNAL File Uploads css-->
    <link href="{{ URL::asset('admin_assets/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!--INTERNAL Select2 css -->
    <link href="{{ URL::asset('admin_assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- INTERNAL Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('admin_assets/plugins/sumoselect/sumoselect.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

    <!-- Data table css -->
    <link href="{{ URL::asset('admin_assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('admin_assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin_assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <!-- Slect2 css -->
    <link href="{{ URL::asset('admin_assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <style>
        .bootstrap-tagsinput {
            width: 100% !important;
        }

        .dark-mode .bootstrap-tagsinput {

            color: rgba(255, 255, 255, 1) !important;
            background-color: transparent;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .dark-mode .bootstrap-tagsinput input {
            color: rgba(255, 255, 255, 1) !important;
        }

        .coupon-row {
            display: flex;
            align-items: center;
            margin: 25px auto;
            width: fit-content;
        }

        .cpnCode {
            border: 2px dashed #bf1c3d;
            height: 50px;
            width: 350px;
            line-height: 47px;
            letter-spacing: 2px;
            border-right: 0;
        }

        .cpnBtn i {
            padding-top: 14px;
        }

        .cpnBtn {
            border: 2px solid #bf1c3d;
            background: #bf1c3d;
            height: 50px;
            width: 50px;
            line-height: 47px;
            color: #fff;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{ $company->title }}</div>
                </div>
                <div class="card-body">
                    <div class="main-profile-contact-list">
                        <div class="media mr-4 mt-0">
                            <div class="media-icon bg-primary text-white mr-3 mt-1">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <small class="text-muted">Phone</small>
                                <div class="font-weight-normal1">
                                    {{ $company->phone }}
                                </div>
                            </div>
                        </div>
                        <div class="media mr-4">
                            <div class="media-icon bg-warning text-white mr-3 mt-1">
                                <i class="fa fa-slack"></i>
                            </div>
                            <div class="media-body">
                                <small class="text-muted">Email</small>
                                <div class="font-weight-normal1">
                                    {{ $company->email }}
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-icon bg-info text-white mr-3 mt-1">
                                <i class="fa fa-map"></i>
                            </div>
                            <div class="media-body">
                                <small class="text-muted">Address</small>
                                <div class="font-weight-normal1">
                                    {{ $company->address }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            @livewire('add-invitation', ['company_id' => $company->id])

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">×</button>
                    <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>{{ $message }}.
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Liste des employes</div>
                    <div class="float-right ml-auto">
                        <a data-target="#modaldemo1" data-toggle="modal" class="btn btn-success">Inviter Employe</a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered text-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Fullname</th>
                                    <th class="wd-15p border-bottom-0">Email</th>
                                    <th class="wd-15p border-bottom-0">Phone</th>
                                    <th class="wd-15p border-bottom-0">Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($company->employes as $employe)
                                    <tr>
                                        <td>{{ $employe->fullname }}</td>
                                        <td>{{ $employe->email }}</td>
                                        <td>{{ $employe->phone }}</td>
                                        <td>{{ $employe->address }}</td>
                                        <td>
                                            @if ($employe->status == 0)
                                                <a href="{{ route('employe-verify', $employe->id) }}"
                                                    class="btn btn-success mb-2">Verifier</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Liste des invitations</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered text-nowrap" id="example2">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Name</th>
                                    <th class="wd-15p border-bottom-0">Email</th>
                                    <th class="wd-15p border-bottom-0">Ouvert</th>
                                    <th class="wd-15p border-bottom-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($company->invitations as $invitation)
                                    <tr>
                                        <td>{{ $invitation->title }}</td>
                                        <td>{{ $invitation->email }}</td>
                                        @if ($invitation->isOpen == 1)
                                            <td><span class="badge badge-success">Ouvert</span></td>
                                        @else
                                            <td><span class="badge badge-danger">Pas encore</span></td>
                                        @endif
                                        <td>
                                            @if ($invitation->isOpen == 0)
                                                @if ($invitation->isCanceled == 0)
                                                    <a href="{{ route('invitation-close', $invitation->id) }}"
                                                        class="btn btn-danger mb-2">Annuler</a>
                                                @else
                                                    <a href="{{ route('invitation-open', $invitation->id) }}"
                                                        class="btn btn-success mb-2">Réactiver</a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
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
    <!-- INTERNAL Select2 js -->
    <script src="{{ URL::asset('admin_assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/js/select2.js') }}"></script>

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
