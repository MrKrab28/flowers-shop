<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | {{ config('app.name') }}</title>
    @include('includes.styles')
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div>
                            <span class="logo">
                                <img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo.png') }}"
                                    alt="looginpage">
                                <img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}"
                                    alt="looginpage">
                            </span>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" action="{{ route('register.store') }}" method="POST">
                                @csrf
                                <h4>Create your account</h4>
                                <p>Enter your personal details to create account</p>
                                <div class="form-group">
                                    <label class="col-form-label" for="name">Nama Lengkap</label>
                                    <input class="form-control" type="name" id="name" name="name"
                                        placeholder="Masukkan nama" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="email">Email</label>
                                    <input class="form-control" type="email" id="email" name="email"
                                        placeholder="Masukkan email" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="password">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" id="password" name="password"
                                            placeholder="Masukkan password" required>
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block w-100" type="submit">Create
                                        Account</button>
                                </div>
                                <p class="mt-4 mb-0">Already have an account?<a class="ms-2"
                                        href="{{ route('login') }}">Sign
                                        in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.scripts')

    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>

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
</body>

</html>
