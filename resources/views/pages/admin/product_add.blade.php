@extends('layouts.vertical')

@section('title', 'New Product')

@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Form Product</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Product</label>
                            <input type="text" class="form-control" id="kode" name="kode" autocomplete="off"
                                required>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Product</label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off"
                                required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp. </span>
                        <input type="text" class="form-control" id="harga" name="harga" autocomplete="off">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="img" name="img" required>
                </div>
                <div class="text-end">
                    <button class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/autonumeric/autonumeric.js') }}"></script>

    <script>
        new AutoNumeric('#harga', {
            allowDecimalPadding: false
        })

        new AutoNumeric('#stok', {
            allowDecimalPadding: false
        })
    </script>
@endpush
