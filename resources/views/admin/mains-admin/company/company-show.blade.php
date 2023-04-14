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
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://cdn.ckeditor.com/4.20.2/full/ckeditor.js"></script>
@endsection

@section('content')
    <div class="row">
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
                    <div class="card-title">Liste des employes</div>
                    <div class="float-right ml-auto">
                        <a data-target="#modaldemo1" data-toggle="modal" class="btn btn-success">Add Employe</a>

                        <div class="modal fade" id="modaldemo1" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter Invitation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('invitation-add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name='company_id' value='{{ $company->id }}'>
                                        <div class="modal-body">
                                            <label class="form-label d-block">Title*</label>
                                            <input class="form-control mb-4" placeholder="title" required type="text"
                                                name='title' value='{{ old('title') }}'>
                                            <label class="form-label d-block">Email*</label>
                                            <input class="form-control mb-4" placeholder="Email" type="email" required
                                                name='email' value='{{ old('email') }}'>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">Save changes</button>
                                            <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close"
                                                type="button">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Fullname</th>
                                    <th class="wd-15p border-bottom-0">Email</th>
                                    <th class="wd-15p border-bottom-0">Phone</th>
                                    <th class="wd-15p border-bottom-0">Address</th>
                                    <th class="wd-15p border-bottom-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($company->employes as $employe)
                                    <tr>
                                        <td>{{ $employe->fullname }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->phone }}</td>
                                        <td>{{ $company->address }}</td>
                                        <td>
                                            <a href="{{ route('show-employe-edit', $employe->id) }}"
                                                class="btn btn-primary mb-2">Edit</a>
                                            @if (count($company->employes) == 0)
                                                <form action="{{ route('employe-delete', [$employe->id]) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf

                                                    <button type="submit" class="btn btn-danger">Disable</a>
                                                </form>
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
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Title</th>
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
                                            <a href="{{ route('invitation-close', $invitation->id) }}"
                                                class="btn btn-danger mb-2">Annuler</a>
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
