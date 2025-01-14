<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" crossorigin="anonymous">
</head>
<body>

    <div style="border: 1px solid #dee2e6; border-radius: 0.25rem;">
        <div style="padding: 1.25rem;">
          <div style="width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; margin-bottom: 3rem ; margin-top: 1rem ;">
            <div style="display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px; display: flex ; align-items: baseline ;">
              <div style="flex: 0 0 75%; max-width: 75%;">
                <p style="color: #7e8d9f; font-size: 20px;">From >> <strong> {{ $data_email['pengirim'] }}</strong></p>
              </div>
              <div style="flex: 0 0 25%; max-width: 25%; float: right ;">

              </div>
              <hr>
            </div>

            <div style="width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
              <div style="flex: 0 0 100%; max-width: 100%;">
                <div style="text-align: center ;">
                  <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ; font-size: 4rem; margin-left: 0 ;"></i>
                    <h1>Toys Store</h1>
                    <h3>Terima Kasih Telah Berbelanja Di Toko Kami </h3>
                    <h5>Barang Berhasil Dipesan</h5>
                    @if ($status == 'Pending')
                        @if ($order->payment == 'Transfer')
                        <h5>Silahkan Transfer Pembayaran Pada Rekening Dibawah ini Dan Lampirkan Bukti Pembayaran Dengan Membalas Email ini</h5>
                        <h6>BRI : 12312312312132 - ToyStore </h6>
                        @endif

                    @elseif ($status == 'Dikirim')
                    <h5>Barang Pesanan Anda Sedang Dalam Perjalanan</h5>

                    @endif

                </div>

              </div>


              <div style="display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;">
                <div style="flex: 0 0 66.666667%; max-width: 66.666667%;">
                  <ul style="padding-left: 0; list-style: none;">
                    <li style="color: #6c757d ;">To: <span style="color:#5d9fc5 ;">{{ $order->customer->email}}</span></li>
                    <li style="color: #6c757d ;">{{ $order->customer->nama }}</li>
                    <li style="color: #6c757d ;">{{ $order->alamat }}</li>
                    <li style="color: #6c757d ;"><i class="fas fa-phone"></i> {{ $order->no_telp }}</li>
                  </ul>
                </div>
                {{-- <div style="flex: 0 0 33.333333%; max-width: 33.333333%;">
                  <p style="color: #6c757d ;">Invoice</p>
                  <ul style="padding-left: 0; list-style: none;">
                    <li style="color: #6c757d ;"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                        style="font-weight: bold ;">ID:</span>ODR{{ $order->id }}{{ $order->customer->id }}</li>
                    <li style="color: #6c757d ;"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                        style="font-weight: bold ;">Tanggal Pengiriman: </span>{{ Carbon\Carbon::parse($order->created_at)->isoFormat('DD MMMM YYYY') }}</li>
                    <li style="color: #6c757d ;"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                        style="margin-right: 0.25rem ; font-weight: bold ;">Status:</span><span style="background-color: #ffcd39; color: #000 ; font-weight: bold ; padding: 0.25rem 0.5rem; border-radius: 0.25rem;">
                        {{ $order->status }}</span></li>
                  </ul>
                </div> --}}
                <div style="flex: 0 0 33.333333%; max-width: 33.333333%;margin-left:30rem; ">
                    <p style="color: #6c757d;">Invoice</p>
                    <ul style="padding-left: 0; list-style: none;margin-top:0">
                        <li style="color: #6c757d;">
                            <i class="fas fa-circle" style="color: #84B0CA;"></i>
                            <span style="font-weight: bold;">ID: ODR{{ $order->id }}{{ $order->customer->id }}</span>
                        </li>
                        <li style="color: #6c757d;">
                            <i class="fas fa-circle" style="color: #84B0CA;"></i>
                            <span style="font-weight: bold;">Tanggal Pengiriman: {{ Carbon\Carbon::parse($order->created_at)->isoFormat('DD MMMM YYYY') }}</span>
                        </li>
                        <li style="color: #6c757d;">
                            <i class="fas fa-circle" style="color: #84B0CA;"></i>
                            <span style="font-weight: bold;">Status:</span>
                            <span style="background-color: #ffcd39; color: #000; font-weight: bold; padding: 0.25rem 0.5rem; border-radius: 0.25rem;">
                                {{ $status }}
                            </span>
                        </li>
                    </ul>
                </div>
              </div>

              <div style="margin-top: 0.5rem ; margin-bottom: 0.5rem ; margin-right: 0.25rem ; margin-left: 0.25rem ; justify-content: center ;">
                <table style="width: 100%; margin-bottom: 1rem; color: #212529; vertical-align: top; border-color: #dee2e6;">
                  <thead style="background-color:#84B0CA ; color: #fff;">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Harga </th>
                      <th scope="col">Jumlah Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $order->items as $item )

                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->product->nama }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp. {{ number_format($item->product->harga) }}</td>
                        <td>Rp. {{ number_format($item->total) }}</td>
                    </tr>

                    @endforeach
                  </tbody>

                </table>
              </div>
              <div style="display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;">
                <div style="flex: 0 0 66.666667%; max-width: 66.666667%;">

                </div>
                <div style="flex: 0 0 33.333333%; max-width: 33.333333%;margin-left:40rem;">

                  <p style="color: #000 ; float: left ;"><span style="color: #000 ; margin-right: 1rem;">Total Belanja</span><span
                      style="font-size: 25px;">Rp. {{ number_format($order->total) }}</span></p>
                </div>
              </div>
              <hr>
              <div style="display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;">
                <div style="flex: 0 0 83.333333%; max-width: 83.333333%;">
                </div>
                <div style="flex: 0 0 16.666667%; max-width: 16.666667%;">
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
