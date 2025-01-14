<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <title>Toy Store</title>
    @include('includes.styles')
    @stack('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    {{-- <div class="tap-top"><i data-feather="chevrons-up"></i></div> --}}

    <div class="page-wrapper horizontal-wrapper" id="pageWrapper">

        @include('includes.user.header')

        {{-- <div class="page-body-wrapper"> --}}
            {{-- <div class="page-body" style="margin-top: 80px"> --}}

                <div class="container pt-4">
                    @yield('content')
                </div>
            {{-- </div> --}}


            <!-- footer start-->

        {{-- </div> --}}
    </div>
        {{-- <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">{{ config('app.name') }}</h1>
            <p class="col-md-8 fs-4">
                Selamat datang di {{ config('app.name') }}! Temukan berbagai produk terbaik untuk
                kebutuhan Anda.
            </p>
            @if (!Auth::guard('admin')->check() && !Auth::check())
                <button class="btn btn-success" onclick="document.location.href = '{{ route('login') }}'">
                    Login
                </button>
                <button class="btn btn-secondary" onclick="document.location.href = '{{ route('register') }}'">
                    Register
                </button>
            @endif
        </div> --}}

        {{-- <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart"
            aria-labelledby="My Cart">
            <div class="offcanvas-header justify-content-center">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>
                        <span class="badge bg-primary rounded-circle pt-2">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Grey Hoodie</h6>
                                <small class="text-body-secondary">Brief description</small>
                            </div>
                            <span class="text-body-secondary">$12</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Dog Food</h6>
                                <small class="text-body-secondary">Brief description</small>
                            </div>
                            <span class="text-body-secondary">$8</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Soft Toy</h6>
                                <small class="text-body-secondary">Brief description</small>
                            </div>
                            <span class="text-body-secondary">$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Total (USD)</span>
                            <strong>$20</strong>
                        </li>
                    </ul>

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                </div>
            </div>
        </div> --}}

        <div id="footer-bottom">
            <div class="container">
                <hr class="m-0">
                <div class="row mt-3">
                    <div class="col-md-6 copyright">
                        <p class="secondary-font">© 2023 Waggy. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                    </div>
                </div>
            </div>
        </div>


        @stack('modals')


        @include('includes.scripts')
        @stack('scripts')
    </body>

</html>
