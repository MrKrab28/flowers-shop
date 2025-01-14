<!-- Page Sidebar Start-->
<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper">
            <a href="/">
                <img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo.png') }}" alt="">
                <img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}" alt="">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="/"><img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}"
                    alt="">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="/">
                            <img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt="">
                        </a>
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ Request::segment(2) == 'product' ? 'active' : '' }}"
                            href="javscript:void(0)">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-bonus-kit') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-bonus-kit') }}"></use>
                            </svg>
                            <span>Product</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{ route('admin.product.add') }}"
                                    class="{{ Request::segment(3) == 'add' ? 'active' : '' }}">
                                    Tambah Product
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.products') }}"
                                    class="{{ Request::segment(3) == 'list' ? 'active' : '' }}">
                                    Daftar Product
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ Request::segment(2) == 'orders' ? 'active' : '' }}"
                            href="javscript:void(0)">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-task') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-task') }}"></use>
                            </svg>
                            <span>Pesanan</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{ route('admin.orders', 'pending') }}"
                                    class="{{ Request::segment(3) == 'pending' ? 'active' : '' }}">
                                    Pending
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.orders', 'proses') }}"
                                    class="{{ Request::segment(3) == 'proses' ? 'active' : '' }}">
                                    Proses
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.orders', 'dikirim') }}"
                                    class="{{ Request::segment(3) == 'dikirim' ? 'active' : '' }}">
                                    Dikirim
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.orders', 'selesai') }}"
                                    class="{{ Request::segment(3) == 'selesai' ? 'active' : '' }}">
                                    Selesai
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ Request::segment(2) == 'reviews' ? 'active' : '' }}"
                            href="{{ route('admin.reviews') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form') }}"></use>
                            </svg>
                            <span>Reviews</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ Request::segment(2) == 'customers' ? 'active' : '' }}"
                            href="{{ route('admin.customers') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-user') }}"></use>
                            </svg>
                            <span>Customers</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
