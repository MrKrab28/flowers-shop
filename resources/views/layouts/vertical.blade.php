<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @hasSection('title')
            @yield('title') | {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>
    @include('includes.styles')
    @stack('styles')
</head>

<body>

    <div class="tap-top"><i data-feather="chevrons-up"></i></div>

    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        @include('includes.admin.header')

        <div class="page-body-wrapper">

            @include('includes.admin.sidebar')
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <h4>@yield('title', 'Dashboard')</h4>
                    </div>
                </div>

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>


            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 footer-copyright text-center">
                            <p class="mb-0">Copyright © 2024</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    @stack('modals')


    @include('includes.scripts')
    <!-- scrollbar js-->
    <script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    @stack('scripts')

</body>

</html>
