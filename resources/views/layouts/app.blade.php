<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta name="_token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" >
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- App favicon -->
        {{-- <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}"> --}}
        <link rel="shortcut icon" href="{{ asset('assets/images/logo-light-sm.svg') }}">

        <script>
            (function() {
                const darkMode = localStorage.getItem('darkMode');
                if (darkMode === 'enabled') {
                    document.write(
                        '<link rel="stylesheet" href="{{ asset("assets/css/bootstrap-dark.min.css") }}" />' +
                        '<link rel="stylesheet" href="{{ asset("assets/css/app-dark.min.css") }}" />'
                    );
                } else {
                    document.write(
                        '<link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}" />' +
                        '<link rel="stylesheet" href="{{ asset("assets/css/app.min.css") }}" />'
                    );
                }
            })();
        </script>


        <!-- jquery.vectormap css -->
        <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        {{-- <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}
        
        <!-- Dropzone -->
        <link href="{{ asset('assets/css/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Select 2 -->
        <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        {{-- <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" /> --}}

      

        @yield('cssLinks')
        <!-- custom Css-->
        <link href="{{ asset('assets/css/fh-custom.css') }}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

    </head>

    {{-- <body data-topbar="dark" data-sidebar="dark"> --}}
    <body data-topbar="dark">
    {{-- <body data-layout="vertical">  --}}

        <!-- Begin page -->
        <div id="layout-wrapper">


          @include('partials.header')

            <!-- ========== Left Sidebar Start ========== -->
           @include('partials.sidebar')
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

               @yield('admin')
                <!-- End Page-content -->

                @include('partials.footer')


            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Apearance</h6>

                <div class="mx-3 p-2">
                    <input type="checkbox" id="mode-switch">
                    <label class="form-check-label" for="mode-switch">Dark Mode</label>
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
       
        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

        <!-- dropzone -->
        <script src="{{ asset('assets/js/dropzone.min.js') }}"></script>
        
        <!-- select 2 -->
        <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

        <!-- apexcharts -->
        <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- highcharts -->
        <script src="{{asset('assets/libs/highcharts/highcharts.js')}}"></script>
        <script src="{{asset('assets/libs/highcharts/exporting.js')}}"></script>
        <script src="{{asset('assets/libs/highcharts/accessibility.js')}}"></script>


        <!-- jquery.vectormap map -->
        <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Buttons examples -->
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

        
        <!-- Datatable init js -->
        <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

        <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
		<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>

        <!--tinymce js-->
        <script src="{{asset('assets/libs/tinymce/tinymce.min.js')}}"></script>

         <!-- init js -->
         <script src="{{asset('assets/js/pages/form-editor.init.js')}}"></script>

         {{-- Datepiker  --}}
         <script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

        <!-- bs custom file input plugin -->
        {{-- <script src="{{asset('assets/libs/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

        <script src="{{asset('assets/js/pages/form-element.init.js')}}"></script> --}}

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <!-- custom js:razib.dev -->
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js" ></script>
        
<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;
 }
 @endif
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('mode-switch');

    // Load saved preference from localStorage
    if (localStorage.getItem('darkMode') === 'enabled') {
        enableDarkMode();
        toggle.checked = true;
    }

    toggle.addEventListener('change', function () {
        if (this.checked) {
            localStorage.setItem('darkMode', 'enabled');
        } else {
            localStorage.setItem('darkMode', 'disabled');
        }
        location.reload(); // force reload to apply theme early
    });

    function enableDarkMode() {
        loadStyle('bootstrap-dark', '{{ asset("assets/css/bootstrap-dark.min.css") }}');
        loadStyle('app-dark', '{{ asset("assets/css/app-dark.min.css") }}');
    }

    function disableDarkMode() {
        removeStyle('bootstrap-dark');
        removeStyle('app-dark');
    }

    function loadStyle(id, href) {
        if (!document.getElementById(id)) {
            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = href;
            link.id = id;
            document.head.appendChild(link);
        }
    }

    function removeStyle(id) {
        const link = document.getElementById(id);
        if (link) {
            link.remove();
        }
    }
});
</script>


@yield('scripts')

</body>
</html>
