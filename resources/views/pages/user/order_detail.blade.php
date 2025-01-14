@extends('layouts.horizontal')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detail Pesanan</h5>
            </div>
        </div>
        <div class="card-body">
            <h5>Customer Detail</h5>

            <table>
                <tr>
                    <td>Nama Lengkap</td>
                    <td class="px-2">:</td>
                    <td>{{ $order->customer->name }}</td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td class="px-2">:</td>
                    <td>{{ $order->no_telp }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td class="px-2">:</td>
                    <td>{{ $order->alamat }}</td>
                </tr>
                <tr>
                    <td>Kode Pos</td>
                    <td class="px-2">:</td>
                    <td>{{ $order->kode_pos }}</td>
                </tr>
                <tr>
                    <td>Metode Pembayaran</td>
                    <td class="px-2">:</td>
                    <td>{{ $order->payment }}</td>
                </tr>
                <tr>
                    <td>Status Pesanan</td>
                    <td class="px-2">:</td>
                    <td>{{ $order->status }}</td>
                </tr>

            </table>

            <hr>
            <h5>Daftar Pesanan</h5>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        @if ($order->status == 'Diterima')
                            <th></th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td class="text-center">
                                <img class="img-fluid img-40" src="{{ asset('files/product/' . $item->product->img) }}"
                                    alt="#">
                            </td>
                            <td>
                                <div class="product-name">
                                    {{ $item->product->nama }}
                                </div>
                            </td>
                            <td>Rp. {{ number_format($item->product->harga) }}</td>
                            <td>
                                {{ $item->qty }}
                            </td>
                            <td>Rp. {{ number_format($item->total) }}</td>
                            @if ($order->status == 'Diterima')
                                <td class="text-center">
                                    @if ($item->review)
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $item->review->score)
                                                <i class="fa fa-star text-warning"></i>
                                            @else
                                                <i class="fa fa-star"></i>
                                            @endif
                                        @endfor
                                    @else
                                        <button class="btn btn-success cart-btn-transform" data-bs-toggle="modal"
                                            data-bs-target="#reviewModal{{ $item->id }}">
                                            Beri Ulasan
                                        </button>
                                        @push('modals')
                                            <div class="modal fade" id="reviewModal{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="reviewModal{{ $item->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="reviewModal{{ $item->id }}Label">
                                                                Ulasan
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('order.review') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="item" value="{{ $item->id }}">
                                                            <div class="modal-body text-center">
                                                                <div class="rating-container">
                                                                    <select class="u-rating-fontawesome" name="rating"
                                                                        autocomplete="off" required>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endpush
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach

                    <tr>
                        <td class="total-amount" colspan="{{ $order->status == 'Diterima' ? '5' : '4' }}">
                            <h6 class="m-0 text-end"><span class="f-w-600">Total Price :</span></h6>
                        </td>
                        <td><span>Rp. {{ number_format($order->items->sum('total')) }}</span>
                        </td>
                    </tr>
                    @if ($order->status == 'Dikirim')
                        <tr>
                            <td class="text-end" colspan="5">
                                <button class="btn btn-warning cart-btn-transform" onclick="terimaPesanan()">
                                    Pesanan Diterima
                                </button>
                                <form id="terimaPesanan"
                                    action="{{ route('order.terima', [
                                        'id' => $order->id,
                                    ]) }}"
                                    method="post">
                                    @method('PUT')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/rating.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>

    <script src="{{ asset('assets/js/rating/jquery.barrating.js') }}"></script>

    <script>
        function terimaPesanan() {
            swal({
                    title: "Terima pesanan ini?",
                    text: "Pastikan semua product telah diterima",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(`#terimaPesanan`).submit()
                    }
                });
        }


        $(".u-rating-fontawesome").barrating({
            theme: "fontawesome-stars",
            showSelectedRating: false,
        });
    </script>
@endpush
