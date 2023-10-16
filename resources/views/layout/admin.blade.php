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
        <div class="container-fluid d-flex justify-content-start gap-3">
            <button href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="border rounded-3 text-decoration-none btn btn-lg">
                <i onclick="toggleSidebar(this)" class="fa-solid fa-bars text-white"></i>
            </button>
            <h1 class="text-white">
                @yield('title', 'title')
            </h1>
        </div>
    </nav>
    @yield('content')
</body>
@endsection