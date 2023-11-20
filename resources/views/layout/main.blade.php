@extends('layout.root')
@section('title', 'title')
@section('body')
  <body>
    <!-- Navbar -->
    <nav class="navbar py-3 bg-white fixed-top">
      <div class="container-fluid d-lg-none d-flex flex-column gap-2">
        
        <div class="d-flex w-100 justify-content-between">
          <a class="navbar-brand flex-sm-grow-1" href="/">
            <img src="{{ asset('assets/images/MySpareLogs.png') }}" class="img-fluid" style="max-height: 50px !important">
          </a>
          <button class="navbar-toggler btn btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" style="height: 50px">
            <i class="fa-solid fa-bars"></i>
          </button>
        </div>
        <form class="w-100 flex-grow-1 " action="{{ route('inventories.search') }}" method="GET">
              <div class="input-group input-group-lg d-flex" style="background-color: #F0F0F0">
                <input name="search" type="text" class="form-control border-end-0 border-dark" placeholder="Cari nama barang..." style="background-color: #F0F0F0">
                <button type="submit" class="btn btn-outline-secondary border-start-0 border-dark">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </div>
          </form>

        <div class="offcanvas offcanvas-end bg-white" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <a class="navbar-brand" href="/">
              <img src="{{ asset('assets/images/MySpareLogs.png') }}" width="150px">
            </a>
            
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            </button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav d-grid gap-4 fs-2">
              @auth
              <li class="nav-item px-2">
                <a class="nav-link text-dark" href="/my-requests">
                  <i class="fa-solid fa-clock-rotate-left"></i>
                  Activity
                </a>
              </li>
              <li class="nav-item px-2">
                <a class="nav-link text-dark" href="/inbox">
                  <i class="fa-regular fa-message"></i>
                    Inbox
                </a>
              </li>
              <li class="nav-item px-2">
                <a class="nav-link text-dark" href="/profile">
                  <i class="fa-regular fa-circle-user"></i>
                  Profile Settings
                </a>
              </li>
              @else
              <li class="nav-item px-2">
                <a class="btn btn-outline-secondary w-100" href="/login">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                  Login
                </a>
              </li>
              @endauth
              @auth
                <li class="nav-item">
                  <div class="d-grid gap-2">
                    <a class="btn btn-primary" href="/ads">
                      Pasang Iklan <i class="fa-solid fa-plus"></i>
                    </a>
                  </div>
                </li>
              @endauth
            </ul>
          </div>
        </div>
        
      </div>

      <div class="container-fluid d-none d-lg-flex justify-content-around">
        
        <a class="navbar-brand" href="/">
          <img src="{{ asset('assets/images/MySpareLogs.png') }}" width="150px">
        </a>

        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon d-lg-none"><i class="fa-solid fa-bars"></i></span>
        </button>
        
        <form class="w-50" action="{{ route('inventories.search') }}" method="GET">
            <div class="input-group input-group-lg d-flex" style="background-color: #F0F0F0">
              <input name="search" type="text" class="form-control border-end-0 border-dark" placeholder="Cari nama barang..." style="background-color: #F0F0F0">
              <button type="submit" class="btn btn-outline-secondary border-start-0 border-dark">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </div>
        </form>

        <ul class="navbar-nav d-flex flex-row @auth justify-content-around @else justify-content-end @endauth align-items-center w-25 gap-3">
          @auth  
            <li class="nav-item">
              <a class="nav-link text-dark" href="/my-requests">
                <i class="fa-solid fa-clock-rotate-left fa-2x"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="/inbox">
                <i class="fa-regular fa-message fa-2x"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="/profile">
                <i class="fa-regular fa-circle-user fa-2x"></i>
              </a>
            </li>
            @else
            <li class="nav-item">
              <a class="btn btn-success rounded-pill" href="/login">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                Login
              </a>
            </li>    
            @endauth
            @auth
            <li class="nav-item">
              <a class="btn btn-primary rounded-pill" href="/ads">
                Pasang Iklan <i class="fa-solid fa-plus"></i>
              </a>
            </li>     
            @endauth
        </ul>

      </div>
    </nav>

@yield('content')

@include('layout.footer')

  <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
</body>
@endsection