<tr>
    <td>
        <img class="img-fluid img-40" src="{{ asset('files/product/' . $item->product->img) }}" alt="#">
    </td>
    <td>
        <div class="product-name">
            {{ $item->product->nama }}
        </div>
    </td>
    <td>Rp. {{ number_format($item->product->harga) }}</td>
    <td>
        <fieldset class="qty-box">
            <div class="input-group bootstrap-touchspin">
                <button class="btn btn-primary btn-square bootstrap-touchspin-down" type="button" wire:click="decrement">
                    <i class="fa fa-minus"></i>
                </button>
                <span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span>
                <input class="touchspin text-center form-control" type="text" readonly value="{{ $item->qty }}">
                <span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span>
                <button class="btn btn-primary btn-square bootstrap-touchspin-up" type="button" wire:click="increment">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </fieldset>
    </td>
    <td>Rp. {{ number_format($item->total) }}</td>
</tr>
