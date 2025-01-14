@extends('layouts.horizontal')

@section('content')
    <div class="card checkout">
        <div class="card-header">
            <h5>Billing Details</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('checkout.order') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xl-6 col-sm-12">
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label for="inputName">Nama</label>
                                <input class="form-control" id="inputName" type="text" value="{{ auth()->user()->name }}"
                                    disabled>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="inputEmail">Email Address</label>
                                <input class="form-control" id="inputEmail" type="email"
                                    value="{{ auth()->user()->email }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="inputAddress" class="form-label">Address</label>
                            <textarea class="form-control" id="inputAddress" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="inputPhone">Phone</label>
                            <input class="form-control" id="inputPhone" name="no_telp" type="text" autocomplete="off"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPostalCode">Postal Code</label>
                            <input class="form-control" id="inputPostalCode" name="kode_pos" type="text"
                                autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-12">
                        <div class="checkout-details">
                            <div class="order-box">
                                <div class="title-box">
                                    <div class="checkbox-title">
                                        <h4>Product </h4><span>Total</span>
                                    </div>
                                </div>
                                <ul class="qty">
                                    @foreach ($items as $item)
                                        <li>{{ $item->product->nama }} × {{ $item->qty }} <span>Rp.
                                                {{ number_format($item->product->harga) }}</span></li>
                                    @endforeach
                                </ul>
                                <ul class="sub-total total">
                                    <li>Total <span class="count">Rp. {{ number_format($items->sum('total')) }}</span></li>
                                </ul>

                                <div class="mb-3">
                                    <label for="inputPayment">Payment method</label>
                                    <select class="form-select" id="inputPayment" name="payment" required>
                                        <option value="" selected hidden>Select</option>
                                        <option value="Cash on Delivery">Cash on Delivery</option>
                                        <option value="Transfer">Transfer</option>
                                    </select>
                                </div>
                                <div class="order-place">
                                    <button class="btn btn-primary">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
