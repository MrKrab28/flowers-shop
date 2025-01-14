<!-- Page Header Start-->
{{-- <div class="page-header">
    <div class="header-wrapper row m-0">
        <form class="form-inline search-full col" action="{{ route('index') }}" method="get">
            <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                            autocomplete="off" placeholder="Search ..." name="q" title="" autofocus>
                        <div class="spinner-border Typeahead-spinner" role="status"><span
                                class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper">
                <a href="/">
                    <img class="img-fluid" src="" alt="">
                </a>
            </div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
            </div>
        </div>

        <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
                <li>
                    <span class="header-search">
                        <svg>
                            <use href="{{ asset('assets/svg/icon-sprite.svg#search') }}"></use>
                        </svg>
                    </span>
                </li>

                @if (Auth::check())
                    <li class="cart-nav onhover-dropdown">
                        <a class="cart-box" href="{{ route('cart') }}">
                            <svg>
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-ecommerce') }}"></use>
                            </svg>
                            @if (auth()->user()->cart && auth()->user()->cartItems->count())
                                <span
                                    class="badge rounded-pill badge-success">{{ auth()->user()->cartItems->count() }}</span>
                            @endif
                        </a>
                    </li>
                @endif
                <li class="profile-nav onhover-dropdown pe-0 py-0">
                    @if (Auth::guard('admin')->check())
                        <div class="media profile-media">
                            <img class="b-r-10" src="{{ asset('assets/images/avatar.png') }}" alt=""
                                style="width: 30px">
                            <div class="media-body">
                                <span>{{ auth()->guard('admin')->user()->name }}</span>
                                <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div">
                            <li>
                                <a href="{{ route('admin.dashboard') }}">
                                    <i data-feather="layout"></i><span>Dashboard</span>
                                </a>
                            </li>
                            <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>
                            <li><a href="{{ route('admin.logout') }}"><i data-feather="log-out">
                                    </i><span>Logout</span></a></li>
                        </ul>
                    @elseif (Auth::check())
                        <div class="media profile-media">
                            <img class="b-r-10" src="{{ asset('assets/images/avatar.png') }}" alt=""
                                style="width: 30px">
                            <div class="media-body">
                                <span>{{ auth()->user()->name }}</span>
                                <p class="mb-0 font-roboto">User <i class="middle fa fa-angle-down"></i></p>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div">
                            <li><a href="{{ route('account') }}"><i data-feather="user"></i><span>Account </span></a>
                            </li>
                            <li><a href="{{ route('orders') }}"><i data-feather="shopping-bag"></i><span>Orders
                                    </span></a></li>
                            <li><a href="{{ route('cart') }}"><i data-feather="shopping-cart"></i><span>Cart
                                    </span></a></li>
                            <li><a href="{{ route('logout') }}"><i data-feather="log-out"> </i><span>Logout</span></a>
                            </li>
                        </ul>
                    @else
                        <button class="btn btn-primary"
                            onclick="document.location.href = '{{ route('login') }}'">Login</button>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div> --}}

<header>
    <div class="container ">
        <div class="row py-4 pb-0 pb-sm-4 align-items-center ">

            <div class="col-sm-4 col-lg-3 text-center text-sm-start">
                <div class="main-logo">
                    <a href="index.html">
                        <img src="{{ asset('assets/images/logo/logo-194297012-1716934698-ff5d28e54b4ac4eaa659d9d2930c9ac71716934698.png') }}" style="height: 80px;width:150px"
                            alt="logo" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
                <div class="search-bar border rounded-2 px-3 border-dark-subtle">
                    <form id="search-form" action="{{ route('index') }}" method="get" class="text-center d-flex align-items-center">
                        <input type="text" name="q" class="form-control border-0 bg-transparent"
                            placeholder="Search products" />
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
                        </svg>
                    </form>
                    {{-- <form class="form-inline search-full col" action="{{ route('index') }}" method="get">
                        <div class="form-group w-100">
                            <div class="Typeahead Typeahead--twitterUsers">
                                <div class="u-posRelative">
                                    <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                        autocomplete="off" placeholder="Search ..." name="q" title="" autofocus>
                                    <div class="spinner-border Typeahead-spinner" role="status"><span
                                            class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                                </div>
                                <div class="Typeahead-menu"></div>
                            </div>
                        </div>
                    </form> --}}
                </div>
            </div>

            <div
                class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
                <ul class="d-flex justify-content-end list-unstyled m-0">
                    @if (Auth::check())
                        <div class="support-box text-end d-none d-xl-block">
                            <li class="me-5">
                                <a href="{{ route('orders') }}" class="mx-3">

                                    <iconify-icon icon="ri:shopping-bag-fill" style="color: black"
                                        class="fs-2 position-relative"></iconify-icon>
                                </a>
                            </li>
                        </div>

                        <div class="support-box text-end d-none d-xl-block">

                            <li class="me-5">
                                <a href="{{ route('cart') }}" class="mx-3">
                                    <iconify-icon icon="mdi:cart" class="fs-2 position-relative"></iconify-icon>
                                    <span
                                        class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                                        0
                                    </span>
                                    @if (auth()->user()->cart && auth()->user()->cartItems->count())
                                        <span
                                            class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                                            {{ auth()->user()->cartItems->count() }}
                                        </span>
                                    @endif
                                </a>

                            </li>

                        </div>

                        <div class="support-box text-end d-none d-xl-block">

                            <li>
                                <div class="dropdown">

                                    <span class="dropdown-toggle text-bg-light" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
                                        {{ Auth()->user()->name }}
                                    </span>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('account') }}">
                                                <iconify-icon icon="mdi:account-cog" style="color: black"
                                                    class="fs-4"></iconify-icon>
                                                Account</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}">
                                                <iconify-icon icon="clarity:logout-solid" style="color: black"
                                                    class="fs-4"></iconify-icon>
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </div>


                    @elseif (Auth::guard('admin')->check())
                        <div class="support-box text-end d-none d-xl-block">
                            <li>
                                <div class="dropdown">

                                    <span class="dropdown-toggle text-bg-light" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
                                        {{ Auth()->guard('admin')->user()->name }}
                                    </span>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                                <iconify-icon icon="streamline:dashboard-3-solid" style="color: black"
                                                    class="fs-4">
                                                </iconify-icon>
                                                Dashboard</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                                <iconify-icon icon="clarity:logout-solid" style="color: black"
                                                    class="fs-4"></iconify-icon>
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </div>
                        @else

                            <div class="support-box text-end d-none d-xl-block">
                                <li class="me-5">
                                    <a class="btn btn-primary mx-3"
                                        onclick="document.location.href = '{{ route('login') }}'">Login</a>
                                </li>
                            </div>
                    @endif

                </ul>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <hr class="m-0">
    </div>

    <div class="container">
        <nav class="main-menu d-flex navbar navbar-expand-lg ">

            <div class="d-flex d-lg-none align-items-end mt-3">
                <ul class="d-flex justify-content-end list-unstyled m-0">
                    <li>
                        <a href="account.html" class="mx-3">
                            <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
                        </a>
                    </li>
                    <li>
                        <a href="wishlist.html" class="mx-3">
                            <iconify-icon icon="mdi:heart" class="fs-4"></iconify-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                            aria-controls="offcanvasCart">
                            <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                            <span class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                                03
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="mx-3" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
                            <iconify-icon icon="tabler:search" class="fs-4"></iconify-icon>
                            </span>
                        </a>
                    </li>
                </ul>

            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header justify-content-center">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                <div class="offcanvas-body justify-content-between">
                    <a class="filter-categories border-0 mb-0 me-5">

                    </a>

                    <ul class="navbar-nav menu-list list-unstyled d-flex gap-md-3 mb-0">
                        <li class="nav-item">
                            <a href="{{ route('index') }}" class="nav-link active">Home</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('index') }}#product" class="nav-link">Shop</a>
                        </li>


                    </ul>



                </div>

            </div>

        </nav>



    </div>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<!-- Page Header Ends -->
