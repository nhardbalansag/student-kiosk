<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        {{-- admin lte --}}
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css') }}">
      <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    {{-- admin lte end --}}
     <!-- Styles -->
     <link href="{{ asset('css/welcome_custom.css') }}" rel="stylesheet">
     <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    @livewireStyles
    </head>
    <body >
        <div>
            <nav class="navbar" style="background-color:rgb(82, 86, 89)">
                <div class="container container-fluid">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a class="navbar-brand " href="/">
                                <img width="150" height="150" src="{{ asset('image/University_of_San_Agustin_Logo.png') }}" alt="">
                            </a>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-4">
                                <h4 class="text-white font-weight-bold ">
                                    {{ env('APP_NAME') }}
                                </h4>
                            </div>
                            <div class="d-none d-md-block col-md-8">
                                <p class="text-white">
                                    to use: Click START, then  select curriculum, afterwards select grades from dropdown in each subject.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container mt-5" style="height: {{ Request::route()->getName() !== 'student-access.input-grades' ? '100vh' : ''}}">
            @yield('content-pages')
        </div>
        <div>
            @include('components.includes.footer')
        </div>

          {{-- fontawesome --}}
          <script src="https://kit.fontawesome.com/9002f92f37.js" crossorigin="anonymous"></script>
          {{-- end fontawesome --}}

          {{-- admin lte scripts --}}
          <!-- jQuery -->
          <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
          <!-- Bootstrap -->
          <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
          <!-- Select2 -->
          <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
          <!-- Bootstrap4 Duallistbox -->
          <script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
          <!-- InputMask -->
          <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
          <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
          <!-- date-range-picker -->
          <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
          <!-- bootstrap color picker -->
          <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
          <!-- Tempusdominus Bootstrap 4 -->
          <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
          <!-- Bootstrap Switch -->
          <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
          <!-- BS-Stepper -->
          <script src="{{ asset('plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
          <!-- dropzonejs -->
          <script src="{{ asset('plugins/dropzone/min/dropzone.min.js') }}"></script>
          <!-- AdminLTE App -->
          <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
          <!-- Page specific script -->
          <!-- DataTables  & Plugins -->
            <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
            <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
            <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
            <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
          {{-- end admin lte scripts --}}
          @livewireScripts
          @stack('student-pages-scripts')
    </body>
</html>
