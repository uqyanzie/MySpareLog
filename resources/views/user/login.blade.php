@extends('layout.root')

@section('title', 'Login')

@section('body')
<body style="height: 100vh">
    <!-- Page Content -->
    <div class="container-fluid d-flex flex-column justify-content-between h-100 p-0 m-auto">
        <div class="container-sm m-auto p-5" style="max-width: 600px">
            <div class="row align-items-center justify-content-center p-auto gap-3">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('loginError')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ asset('assets/images/MySpareLogs.png') }}" style="width: 316px;">
                    <h2 class="fs-2">Welcome Back!</h2>
                </div>
                <form class="row g-3" action="/login" method="post">
                    @csrf
                    <div class="col-12 form-group">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg">
                    </div>
                    <div class="col-12 form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg">
                    </div>
                    <div class="col-12 form-group">
                        <button type="submit" class="btn btn-primary btn-lg mt-3 w-100">Log In</button>
                    </div>
                </form>
            </div>
        </div>
        @include('layout.footer')
    </div>
</body>
@endsection