<!DOCTYPE html>
<html lang="en">

<head>
    <title>BGF | Employee Performance Evaluation App</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/dist/img/logo.png')}}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/min/dropzone.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
    @livewireStyles
    <style>
        .success {
            background-color: #64dd17;
        }
    </style>
</head>

<body class="hold-transition layout-top-nav text-sm">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light bg-gradient-to-r from-blue-700 via-blue-500 success">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <img src="{{asset('assets/dist/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('dashboard')}}" class="nav-link text-white">Previous Evalutions</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('new.evaluation')}}" class="text-white nav-link">New Evaluation</a>
                        </li>

                        @if(auth()->user()->role_HOD)
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-white">HOD Review</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="{{route('hod.it')}}" class="dropdown-item">IT</a></li>
                                <li><a href="{{route('hod.me')}}" class="dropdown-item">M&E</a></li>
                                <li><a href="{{route('hod.Forestry')}}" class="dropdown-item">Forestry</a></li>
                                <li><a href="{{route('hod.Accounts')}}" class="dropdown-item">Accounts</a></li>
                                <li><a href="{{route('hod.Operations')}}" class="dropdown-item">Operations</a></li>
                                <li><a href="{{route('hod.MITI')}}" class="dropdown-item">Miti Magazine</a></li>
                                <li><a href="{{route('hod.Communications')}}" class="dropdown-item">Communications</a></li>
                                <li><a href="{{route('hod.HR')}}" class="dropdown-item">Human Resources</a></li>
                                <li class="dropdown-divider"></li>
                            </ul>
                        </li>
                        @endif
                        @if(auth()->user()->role_admin)
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-white">HR Role</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="{{route('follow.up')}}" class="dropdown-item">Logs</a></li>
                                <li><a href="{{route('add.dropdown')}}" class="dropdown-item">Add DropDown Items</a></li>
                                <li class="dropdown-divider"></li>
                            </ul>
                        </li>
                        @endif

                    </ul>

                    <!-- Right navbar links -->
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <!-- Notifications Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-user text-white"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-header hover:text-blue-600 font-bold cursor-pointer" :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">Logout
                                    </a>
                                </form>
                                <div class="dropdown-divider"></div>

                        </li>
                    </ul>
                </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="text-green-800 font-bold">Employee Performance Evaluation System</h5>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">{{Request::segment(1)}}</a></li>
                                <li class="breadcrumb-item active">{{Request::segment(2)}}</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    @if(Request::segment(1) == 'user')
                    <div class="btn-group w-100">
                        <a href="{{route('more.information')}}" class="btn {{Request::segment(2) == 'Extra-Information' ? 'bg-warning' : 'btn-primary'}} col cancel">
                            <i class="fas fa-user"></i>
                            <span class="text-xs">Employee</span>
                        </a>
                        <a href="{{route('section.one')}}" class="btn {{Request::segment(2) == 'Section-one' ? 'bg-warning' : 'btn-primary'}} col cancel">
                            <i class="fas fa-address-card"></i>
                            <span class="text-xs">Section 1</span>
                        </a>
                        <a href="{{route('section.two')}}" class="btn  {{Request::segment(2) == 'Section-two' ? 'bg-warning' : 'btn-primary'}} col cancel">
                            <i class="fas fa-user-tag"></i>
                            <span class="text-xs">Section 2</span>
                        </a>
                        <a href="#" class="btn {{Request::segment(2) == 'Section-three' ? 'bg-warning' : 'btn-primary'}} col cancel">
                            <i class="fas fa-user-cog"></i>
                            <span class="text-xs">Section 3</span>
                        </a>
                        <a href="{{route('section.four')}}" class="btn {{Request::segment(2) == 'Section-four' ? 'bg-warning' : 'btn-primary'}} col cancel">
                            <i class="fas fa-tools"></i>
                            <span class="text-xs">Section 4</span>
                        </a>
                        <a href="{{route('section.five')}}" class="btn {{Request::segment(2) == 'Section-five' ? 'bg-warning' : 'btn-primary'}} col cancel">
                            <i class="fas fa-toolbox"></i>
                            <span class="text-xs">Section 5</span>
                        </a>
                        <a href="{{route('section.six')}}" class="btn {{Request::segment(2) == 'Section-six' ? 'bg-warning' : 'btn-primary'}} col cancel">
                            <i class="fas fa-tasks"></i>
                            <span class="text-xs">Section 6</span>
                        </a>
                        <a href="{{route('final')}}" class="btn {{Request::segment(2) == 'preview' ? 'bg-warning' : 'btn-primary'}} col cancel">
                            <i class="fas fa-book"></i>
                            <span class="text-xs">Preview</span>
                        </a>
                    </div>
                    @endif
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            {{$slot}}
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Better Globe Forestry
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2021 <a href="https://evaluation.betterglobeforestry.co.ke">Perfomance Evaluation App</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
    @livewireScripts
    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
    <!-- date-range-picker -->
    <script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- BS-Stepper -->
    <script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
    <!-- dropzonejs -->
    <script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- Page specific script -->
    @stack('scripts')
    @include('layouts.scripts')
    {!! Toastr::message() !!}

    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
</body>

</html>