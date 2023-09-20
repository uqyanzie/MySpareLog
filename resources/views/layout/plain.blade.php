@extends('layout.root')
@section('title', 'title')

@section('body')
<body>

    <header class="px-5 py-3" style="display: flex;justify-content:space-between;align-items:center;">
        <a href="/"><i class="fa-solid fa-chevron-left fs-4"></i></a>
        <h3 style="font-weight:600">{{$title}}</h3>
        <img src="{{ asset('assets/images/MySpareLogs.png') }}" style="width: 180px; padding-top:8px">
    </header>
    
    @yield('content')

    @include('layout.footer')
</body>