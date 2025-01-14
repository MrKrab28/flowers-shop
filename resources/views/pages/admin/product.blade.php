@extends('layouts.vertical')

@section('title', 'Product')

@section('content')
    <div class="product-grid">
        @livewire('products')
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>

    <script>
        function deleteData(id) {
            swal({
                    title: "Hapus data ini?",
                    text: "Data yang terhapus tak dapat dikembalikan",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(`#deleteProduct${id}`).submit()
                    }
                });
        }
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
