@extends('layouts.vertical')

@section('title', 'Detail Pesanan')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5>Customer Detail</h5>

            <table>
                <tr>
                    <td>Nama Lengkap</td>
                    <td class="px-2">:</td>
                    <td>{{ $order->customer->name }}</td>
                </tr>
                <tr>
                    <td>email</td>
                    <td class="px-2">:</td>
                    <td>{{ $order->customer->email }}</td>
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
                @if (request()->route('status') == 'dikirim' || request()->route('status') == 'diterima')
                    <tr>
                        <td>Status Pesanan</td>
                        <td class="px-2">:</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                @endif

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
                        </tr>
                    @endforeach

                    <tr>
                        <td class="total-amount" colspan="4">
                            <h6 class="m-0 text-end"><span class="f-w-600">Total Price :</span></h6>
                        </td>
                        <td><span>Rp. {{ number_format($order->items->sum('total')) }}</span>
                        </td>
                    </tr>
                    @if (request()->route('status') != 'dikirim' && request()->route('status') != 'diterima')
                        <tr>
                            <td class="text-end" colspan="5">
                                <form
                                    action="{{ route('admin.order.update', [
                                        'id' => $order->id,
                                        'status' => request()->route('status'),
                                    ]) }}"
                                    method="post">
                                    @csrf
                                    <button class="btn btn-success cart-btn-transform">
                                        @switch(request()->route('status'))
                                            @case('pending')
                                                Update Pesanan
                                            @break

                                            @case('proses')
                                                Kirim Pesanan
                                            @break
                                        @endswitch
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            
        </div>
    </div>
@endsection
