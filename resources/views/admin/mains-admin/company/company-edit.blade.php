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
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Company </h3>
                </div>
                <form action="{{ route('company-update', [$company->id]) }}" method='POST' role="form"
                    enctype="multipart/form-data">
                    @csrf
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
                                <h3 class="expanel-title" style="text-align: center">Company Information &nbsp
                                </h3>
                            </div>
                            <div class="expanel-body">
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Company title*</label>
                                        <input class="form-control mb-4" placeholder="Company title" required type="text"
                                            name='title' value='{{ $company->title }}'>
                                    </div>
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Email*</label>
                                        <input class="form-control mb-4" placeholder="Email" type="email" required
                                            name='email' value='{{ $company->email }}'>
                                    </div>
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Phone*</label>
                                        <input class="form-control mb-4" placeholder="Phone" type="text" required
                                            name='phone' maxlength="10" value='{{ $company->phone }}'>
                                    </div>
                                    <div class="col-lg">
                                        <label class="col-md-12 form-label">Address*</label>
                                        <input class="form-control mb-4" placeholder="Address" type="text" required
                                            name='address' value='{{ $company->address }}'>
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
