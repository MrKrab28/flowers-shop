@extends('layouts.vertical')

@section('title', 'Customers')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Pelanggan</h5>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover" id="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Tanggal Mendaftar</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ Carbon\Carbon::parse($user->created_at)->isoFormat('DD MMMM YYYY') }}</td>
                            <td>
                                <button class="btn btn-success"
                                    onclick="document.location.href = '{{ route('admin.customer.edit', $user->id) }}'">Edit</button>
                                <button class="btn btn-danger" onclick="deleteData({{ $user->id }})">Hapus</button>
                                <form action="{{ route('admin.customer.delete') }}" method="post"
                                    id="deleteUser{{ $user->id }}">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                </form>
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
                        $(`#deleteUser${id}`).submit()
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
