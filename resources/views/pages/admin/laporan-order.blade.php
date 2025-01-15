<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 5mm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            color: #333;
            line-height: 1.4;
        }

        h3 {
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
            /* Menyesuaikan lebar berdasarkan konten */
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 5px;
            font-size: 10px;
            word-wrap: break-word;
            /* Menghindari teks meluap */
            vertical-align: middle;
            /* Menyelaraskan vertikal */
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
            /* Tengah horizontal untuk header */
        }

        td {
            text-align: left;
            /* Rata kiri untuk semua td */
        }

        .text-center {
            text-align: center;
        }

        /* Membungkus tabel dengan overflow-x agar dapat digulir jika diperlukan */
        .table-wrapper {
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <div class="text-center">
        <img src="" width="200" alt="Logo Perusahaan">
       
        <img src="{{ public_path('assets/images/logo/logo-194297012-1716934698-ff5d28e54b4ac4eaa659d9d2930c9ac71716934698.png') }}" style="height: 50px;" alt="">
        <div class="sekret">

        </div>
    </div>

    <h3 style="margin-bottom: 10px">Laporan Penjualan</h3>
    <table style="width: 100%;">
        <thead>
            <tr>
                <th width="3%">No</th>
                <th>customer</th>
                <th>Kode product</th>
                <th>product</th>
                <th>payment</th>
                <th>Jumlah Product</th>
                <th>Total Harga</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            {{-- @php
            $namaMetode = $metodes->where('id', $order->metode)->first();
            $hargaProperty = $hargas->where('nominal', $order->nominal_harga)->first();
            $nominal_cicilan = $hargaProperty->nominal / $order->jumlah_pembayaran;
            $property = $properties->where('property', $order->nama_property)->first();
            @endphp --}}
            <tr>
                @foreach ($order->items as $item)
                <td>{{ $loop->parent->iteration }}</td>
                        <!-- Menampilkan urutan item dalam order -->
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $item->kode_product }}</td>
                        <td>{{ $item->product->nama }}</td>
                        <td>{{ $order->payment }}</td>
                        <td>{{ $item->qty }}x</td>
                        <td>Rp.{{ number_format($order->total) }}</td>
                    </tr>
                @endforeach
            @endforeach

        </tbody>
    </table>
</body>

</html>
