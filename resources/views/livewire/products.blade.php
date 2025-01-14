<div>
    <div class="feature-products">
        <div class="row">
            <form>
                <div class="form-group m-0">
                    <input class="form-control" type="search" placeholder="Search..." wire:model.live="searchKeyword"><i
                        class="fa fa-search"></i>
                </div>
            </form>
        </div>
    </div>
    <div class="product-wrapper-grid">
        <div class="row">
            @forelse ($products as $product)
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="card">
                        <div class="product-box">
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
                                        <li>
                                            <button class="btn" type="button"
                                                onclick="deleteData('{{ $product->kode }}')">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </li>
                                    </ul>
                                    <form action="{{ route('admin.product.delete') }}"
                                        id="deleteProduct{{ $product->kode }}" method="post">
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
                                                    <div class="product-qnty">
                                                        <h6 class="f-w-600">Stok</h6>
                                                        <div class="mb-3">
                                                            <input class="form-control w-75" type="text"
                                                                value="{{ $product->stok }}" readonly>
                                                        </div>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.product.edit') }}?kode={{ $product->kode }}">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details">
                                <a href="product-page.html">
                                    <h4>{{ $product->nama }}</h4>
                                </a>
                                <p>{{ Str::limit($product->deskripsi, 50, '...') ?? '-' }}</p>
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
