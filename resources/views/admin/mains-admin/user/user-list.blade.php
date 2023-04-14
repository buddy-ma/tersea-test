@extends('admin.layouts.master')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        .dropdown-toggle {
            height: 40px;
            width: 400px !important;
        }
    </style>
@endsection
@section('page-header')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">User List</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a><i class="fe fe-layout  mr-2 fs-14"></i>Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">User List</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
@endsection
@section('content')
    <!-- Row -->
    <div class="row flex-lg-nowrap">
        <div class="col-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">×</button>
                    <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>{{ $message }}.
                </div>
            @endif
            @livewire('users')
        </div>
    </div>
@endsection
@section('js')
    <!-- INTERNAl Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/datatables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/multipleselect/multi-select.js') }}"></script>

    <!-- INTERNAL Clipboard js -->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>

    <!-- INTERNAL Prism js -->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <!-- INTERNAL Select2 js -->
    {{-- <script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('assets/js/select2.js') }}"></script> --}}

    <!--INTERNAL Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>

    <!--INTERNAL Form Advanced Element -->
    <script src="{{ URL::asset('assets/js/formelementadvnced.js') }}"></script>
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <script type="text/javascript">
        function toDesable(id) {
            $.ajax({
                url: "/mgmt/user/toDesable/" + id,
                method: "GET",
                success: function(response) {

                    if (response == 1) {
                        document.getElementById("Desable").innerHTML = "Enable";
                        document.getElementById("Desable").classList.remove("btn-danger");
                        document.getElementById("Desable").classList.add("btn-success");
                    } else {
                        document.getElementById("Desable").innerHTML = "Desable";
                        document.getElementById("Desable").classList.remove("btn-success");
                        document.getElementById("Desable").classList.add("btn-danger");
                    }
                }
            });
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select').selectpicker();
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
