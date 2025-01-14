<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="card">
        <div class="card-body">
          <div class="container mb-5 mt-3">
            <div class="row d-flex align-items-baseline">
              <div class="col-xl-9">
                <p style="color: #7e8d9f;font-size: 20px;">From >> <strong> {{ $pengirim }}</strong></p>
              </div>
              <div class="col-xl-3 float-end">

              </div>
              <hr>
            </div>

            <div class="container">
              <div class="col-md-12">
                <div class="text-center">
                  <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                    <h1>Toys Store</h1>
                    <h3>Terima Kasih Telah Berbelanja Di Toko Kami </h3>
                    <h5>Barang Pesanan Anda Sedang Dalam Perjalanan</h5>
                    <h6>Mohon Di Tunggu Yah</h6>
                </div>

              </div>


              <div class="row">
                <div class="col-xl-8">
                  <ul class="list-unstyled">
                    <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{ $order->customer->email}}</span></li>
                    <li class="text-muted">{{ $order->customer->nama }}</li>
                    <li class="text-muted">{{ $order->alamat }}</li>
                    <li class="text-muted"><i class="fas fa-phone"></i> {{ $order->no_telp }}</li>
                  </ul>
                </div>
                <div class="col-xl-4">
                  <p class="text-muted">Invoice</p>
                  <ul class="list-unstyled">
                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                        class="fw-bold">ID:</span>ODR{{ $order->id }}{{ $order->customer->id }}</li>
                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                        class="fw-bold">Tanggal Pengiriman: </span>{{ Carbon\Carbon::parse($order->created_at)->isoFormat('DD MMMM YYYY') }}</li>
                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                        class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                        {{ $order->status }}</span></li>
                  </ul>
                </div>
              </div>

              <div class="row my-2 mx-1 justify-content-center">
                <table class="table table-striped table-borderless">
                  <thead style="background-color:#84B0CA ;" class="text-white">
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
              <div class="row">
                <div class="col-xl-8">

                </div>
                <div class="col-xl-3">

                  <p class="text-black float-start"><span class="text-black me-3"> Total Belanja</span><span
                      style="font-size: 25px;">Rp. {{ number_format($order->total) }}</span></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xl-10">
                </div>
                <div class="col-xl-2">
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
{{--
      <h3>From : {{ $data_email['pengirim'] }}</h3>
      <h1>Hai </h1>
      <h1>{!! $data_email['isi'] !!}</h1> --}}


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

{{--
    <h3>From : {{ $data_email['pengirim'] }}</h3>
    <h1>Hai </h1>
    <h1>{!! $data_email['isi'] !!}</h1> --}}
</body>
</html>
