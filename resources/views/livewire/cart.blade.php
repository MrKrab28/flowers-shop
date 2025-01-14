<div>
    <div class="card">
        <div class="card-header">
            <h5>Cart</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="order-history table-responsive wishlist">
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
                            @if ($cart)
                                @forelse ($cart->items as $item)
                                    @livewire('cart-item', ['item' => $item], key($item->id))
                                @empty
                                    <tr>
                                        <td colspan="5">Tidak ada item</td>
                                    </tr>
                                @endforelse
                                @if ($cart->items->count())
                                    <tr>
                                        <td class="total-amount" colspan="4">
                                            <h6 class="m-0 text-end"><span class="f-w-600">Total Price :</span></h6>
                                        </td>
                                        <td><span>Rp. {{ number_format($cart->items->sum('total')) }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="5">
                                            <a class="btn btn-success cart-btn-transform"
                                                href="{{ route('checkout') }}">
                                                Checkout
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @else
                                <tr>
                                    <td colspan="5">Tidak ada item</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</div>
