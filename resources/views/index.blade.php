@extends('layouts.horizontal')

@section('content')

    @if (Request::has('q'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            Menampilkan semua hasil untuk "<b>{{ Request::get('q') }}</b>"
        </div>
    @else
    <section id="banner" style="background: #F9F3EC;">
        <div class="container">
            <div class="swiper main-swiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide py-0">
                        <div class="row banner-content align-items-center">
                            <div class="img-wrapper col-md-5">
                                <img src="{{ asset('assets/images/logo/hero2.png') }}" class="img-fluid">
                            </div>
                            <div class="content-wrapper col-md-7 p-5 mb-3">
                                <h3 class="banner-title display-1 fw-normal">Rangkai Kebahagiaan dalam Setiap <span
                                        class="text-primary"> Bunga</span>
                                </h3>
                                <a href="#product"
                                    class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1 mt-3">
                                    shop now
                                    <svg width="24" height="24" viewBox="0 0 24 24" class="mb-0">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg></a>
                            </div>

                        </div>
                    </div>
                    <div class="swiper-slide py-5">
                        <div class="row banner-content align-items-center">
                            <div class="img-wrapper col-md-5">
                                <img src="images//banner-img3.png" class="img-fluid">
                            </div>
                            <div class="content-wrapper col-md-7 p-5 mb-5">
                                <div class="secondary-font text-primary text-uppercase mb-4">Save 10 - 20 % off
                                </div>
                                <h2 class="banner-title display-1 fw-normal">Best destination for <span
                                        class="text-primary">your
                                        pets</span>
                                </h2>
                                <a href="#product"
                                    class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                                    shop now
                                    <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg></a>
                            </div>

                        </div>
                    </div>
                    <div class="swiper-slide py-5">
                        <div class="row banner-content align-items-center">
                            <div class="img-wrapper col-md-5">
                                <img src="images/banner-img4.png" class="img-fluid">
                            </div>
                            <div class="content-wrapper col-md-7 p-5 mb-5">
                                <div class="secondary-font text-primary text-uppercase mb-4">Save 10 - 20 % off
                                </div>
                                <h2 class="banner-title display-1 fw-normal">Best destination for <span
                                        class="text-primary">your
                                        pets</span>
                                </h2>
                                <a href="#product"
                                    class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                                    shop now
                                    <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg></a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="swiper-pagination mb-5"></div>

            </div>
        </div>
    </section>

        <h3 class="mb-3">Daftar produk</h3>
    @endif

    <div class="product-grid" id="product">
        <div class="product-wrapper-grid">
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-sm-4 col-md-3 col-xl-2">
                        <div class="card">
                            <div class="product-box" id="product">
                                <div class="product-img">
                                    <img class="img-barang" src="{{ asset('files/product/' . $product->img) }}"
                                        alt="">
                                    <div class="product-hover">
                                        <ul>
                                            <li>
                                                <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#modalCenter{{ $product->kode }}">
                                                    <i class="icon-eye"></i>
                                                </button>
                                            </li>
                                        </ul>
                                        <form action="#" id="deleteBarang{{ $product->kode }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="kode" value="{{ $product->kode }}">
                                        </form>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalCenter{{ $product->kode }}" tabindex="-1" role="dialog"
                                    aria-labelledby="modalCenter{{ $product->kode }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="product-box row">
                                                    <div class="product-img col-lg-6">
                                                        <img class="img-fluid"
                                                            src="{{ asset('files/product/' . $product->img) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="product-details col-lg-6 text-start">
                                                        <h4>{{ $product->nama }}</h4>
                                                        <div class="product-price">
                                                            Rp. {{ number_format($product->harga) }}
                                                        </div>
                                                        <div class="product-view mb-3">
                                                            <h6 class="f-w-600">Product Details</h6>
                                                            <p class="mb-0">
                                                                {{ $product->deskripsi }}
                                                            </p>
                                                        </div>
                                                        @if (!Auth::guard('admin')->check())
                                                            <div class="product-qnty">
                                                                <h6 class="f-w-600">Quantity</h6>
                                                                <form action="{{ route('cart.store') }}" method="post">
                                                                    @csrf
                                                                    <fieldset>
                                                                        <div class="input-group">
                                                                            <input class="touchspin text-center"
                                                                                type="text" name="qty"
                                                                                value="1">
                                                                        </div>
                                                                    </fieldset>

                                                                    <div class="addcart-btn">
                                                                        <input type="hidden" name="product"
                                                                            value="{{ $product->kode }}">
                                                                        <button class="btn btn-primary">
                                                                            Add to Cart
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        @else
                                                            <div class="product-qnty">
                                                                <h6 class="f-w-600">Stok</h6>
                                                                <div class="mb-3">
                                                                    <input class="form-control w-75" type="text"
                                                                        value="{{ $product->stok }}" readonly>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details">
                                    @if ($product->rating)
                                        <div class="rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $product->rating)
                                                    <i class="fa fa-star"></i>
                                                @else
                                                    <i class="fa fa-star text-secondary"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    @endif
                                    <h4>{{ $product->nama }}</h4>
                                    <p>{{ Str::limit($product->deskripsi, 30, '...') ?? '-' }}</p>
                                    <div class="product-price">
                                        Rp. {{ number_format($product->harga) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted py-5">Tidak ada data ditemukan</p>
                @endforelse
            </div>

            {{ $products->links() }}
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/touchspin/touchspin.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin/input-groups.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>

    @if (Session::has('success'))
        <script>
            swal({
                title: "Berhasil!",
                text: "{{ Session::get('success') }}",
                icon: "success",
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            swal({
                title: "Gagal!",
                text: "{{ Session::get('error') }}",
                icon: "error",
            })
        </script>
    @endif
@endpush
