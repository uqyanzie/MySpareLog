@extends('layout.root')
@section('title', 'title')

<style>
    .bg-blue-light-gradient{
        background: linear-gradient(90.21deg, #0E73B9 27.53%, #2FB6E9 66.07%);
    }
</style>

@section('body')
<body class="">
    <nav class="navbar py-3 bg-white bg-blue-light-gradient">
        <?php
            $previous = "javascript:history.go(-1)";
            if(isset($_SERVER['HTTP_REFERER'])) {
                $previous = $_SERVER['HTTP_REFERER'];
            }
        ?>
        <div class="container-fluid d-flex justify-content-start gap-3">
            <a href="{{auth()->user()->role == 'admin' ? '/admin' : $previous}}" class="text-white"> <i class="fa-solid fa-chevron-left fs-4"> </i></a>
            <button href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="border rounded-3 text-decoration-none btn btn-lg">
                <i onclick="toggleSidebar(this)" class="fa-solid fa-bars text-white"></i>
            </button>
            <h1 class="text-white">
                @yield('title', 'title')
            </h1>
        </div>
    </nav>
    @yield('content')
    <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
</body>
@endsection