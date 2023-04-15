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
    </style>
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">profile</div>
                </div>
                <div class="card-body">
                    <div class="main-profile-contact-list">
                        <div class="media mr-4 mt-0">
                            <div class="media-icon bg-primary text-white mr-3 mt-1">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="media-body">
                                <small class="text-muted">Fullname</small>
                                <div class="font-weight-normal1">
                                    {{ $profile->fullname }}
                                </div>
                            </div>
                        </div>
                        <div class="media mr-4">
                            <div class="media-icon bg-secondary text-white mr-3 mt-1">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <small class="text-muted">Phone</small>
                                <div class="font-weight-normal1">
                                    {{ $profile->phone }}
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
                                    {{ $profile->email }}
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
                                    {{ $profile->address }}
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-icon bg-indigo text-white mr-3 mt-1">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <div class="media-body">
                                <small class="text-muted">Date de naissance</small>
                                <div class="font-weight-normal1">
                                    {{ $profile->date_naissance }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">×</button>
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
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Modifier les données</div>
                </div>
                <form action="{{ route('profile') }}" method='POST' role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body pb-2">

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
                                            name='fullname' value='{{ $profile->fullname }}'>
                                    </div>
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Email*</label>
                                        <input class="form-control mb-4" placeholder="Email" type="email" required
                                            name='email' value='{{ $profile->email }}'>
                                    </div>
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Phone*</label>
                                        <input class="form-control mb-4" placeholder="Phone" type="text" required
                                            name='phone' maxlength="10" value='{{ $profile->phone }}'>
                                    </div>
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Address*</label>
                                        <input class="form-control mb-4" placeholder="Address" type="text" required
                                            name='address' value='{{ $profile->address }}'>
                                    </div>
                                </div>
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Date naissance*</label>
                                        <input class="form-control mb-4" placeholder="Date naissance" type="date"
                                            required name='date_naissance' value='{{ $profile->date_naissance }}'>
                                    </div>
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Password*</label>
                                        <input class="form-control mb-4" placeholder="Password" type="password"
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
    </div>
@endsection
@section('js')
    <!-- INTERNAL Select2 js -->
    <script src="{{ URL::asset('admin_assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/js/select2.js') }}"></script>

    <!-- INTERNAL Datepicker js -->
    <script src="{{ URL::asset('admin_assets/plugins/date-picker/date-picker.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/date-picker/jquery-ui.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/input-mask/jquery.maskedinput.js') }}"></script>

    <!-- INTERNAL File-Uploads Js-->
    <script src="{{ URL::asset('admin_assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

    <!-- INTERNAL File uploads js -->
    <script src="{{ URL::asset('admin_assets/plugins/fileupload/js/dropify.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/js/filupload.js') }}"></script>

    <!--INTERNAL Sumoselect js-->
    <script src="{{ URL::asset('admin_assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>

    <!--INTERNAL Form Advanced Element -->
    <script src="{{ URL::asset('admin_assets/js/formelementadvnced.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/js/form-elements.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/js/file-upload.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        window.addEventListener('swal:addBien', event => {
            var form = document.createElement("div");
            form.innerHTML = `
                <div class="form-row">
                    <div class="form-group col-6 mb-0">
                        <div class="form-group">
                            <label class="form-label text-left">Titre*</label>
                            <input type="text" name="title" class="form-control" id="title" required/>
                        </div>
                    </div>
                    <div class="form-group col-6 mb-0">
                        <div class="form-group">
                            <label class="form-label text-left">Prix*</label>
                            <input type="text" name="prix" class="form-control" id="prix" required/>
                        </div>
                    </div>
                    <div class="form-group col-12 mb-0">
                        <div class="form-group">
                            <label class="form-label text-left">Surface*</label>
                            <input type="text" name="surface" class="form-control" id="surface" /><br>
                        </div>
                    </div>
                </div>
            `;

            new swal({
                title: 'Ajouter appartement',
                html: form,
                showCancelButton: true,
                confirmButtonText: 'Save',
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    var title = document.getElementById("title").value;
                    var prix = document.getElementById("prix").value;
                    var surface = document.getElementById("surface").value;
                    Livewire.emit('submitAddBien', title, prix, surface);
                }
            });
        });
    </script>
@endsection
