@extends('layouts.vertical')

@section('title', 'Pesanan ' . ucfirst(request()->route('status')))

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Pesanan</h5>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover" id="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>No. Telp</th>
                        <th>Jumlah Pesanan</th>
                        <th>Total Harga</th>
                        <th>Payment Method</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->no_telp }}</td>
                            <td>{{ $order->items->count() }}</td>
                            <td>Rp. {{ number_format($order->total) }}</td>
                            <td>{{ $order->payment }}</td>
                            <td>
                                <button class="btn btn-primary"
                                    onclick="document.location.href = '{{ route('admin.order.detail', [
                                        'status' => request()->route('status'),
                                        'id' => $order->id,
                                    ]) }}'">
                                    Detail
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>

    <script>
        $('#table').DataTable({
            "ordering": false,
        });
    </script>

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
