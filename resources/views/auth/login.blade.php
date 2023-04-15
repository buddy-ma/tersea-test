@extends('admin.layouts.master2')
@section('css')
@endsection
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col mx-auto">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            @if ($errors->any())
                                <div class="bg-danger text-white px-4 py-2 br-3 mb-4" role="alert">
                                    Whoops !
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card">
                                <div class="text-center title-style " style="margin-bottom: 50px">
                                    <h1>Login</h1>
                                </div>
                                <div class="card-body">
                                    {{-- Inputs with values only for testing --}}
                                    <form method="POST" action="{{ route('admin-login') }}">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fe fe-user"></i>
                                                </div>
                                            </div>
                                            <input type="email" class="form-control" style="height: 50px" name="email"
                                                value="admin@tersea.com" required autocomplete="email" autofocus
                                                placeholder="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fe fe-lock"></i>
                                                </div>
                                            </div>
                                            <input type="password" class="form-control" style="height: 50px" name="password"
                                                required autocomplete="current-password" placeholder="Password"
                                                value="123456789">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-info btn-block px-4">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
