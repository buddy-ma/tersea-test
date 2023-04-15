@extends('admin.layouts.master')
@section('css')
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
                    <h3 class="card-title">Add Company </h3>
                </div>
                <form action="{{ route('company-add') }}" method='POST' role="form" enctype="multipart/form-data">
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
                                            name='title' value='{{ old('title') }}'>
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
@endsection
