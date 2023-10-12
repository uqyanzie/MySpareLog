@extends('layout.main')

@section('title', 'Pemilik')

@section('content')

    <!-- Page Content -->
    <!-- Information Here -->
    <div style="margin-top: 100px"></div>
        <div class="text-black p-4 px-5" style="background-color:#2FB6E9;">
            <h2 class="mb-0">
                Tangki Timbun BBM 
            </h2>
        </div>
        <!-- Information Ends Here -->
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('storage/inventories/'.$inventoryImages[0]->filename)}}" class="d-block w-100" style="max-height: 600px; object-fit: contain">
                </div>
                @for ($i = 1; $i < count($inventoryImages); $i++)
                    <div class="carousel-item">
                        <img src="{{asset('storage/inventories/'.$inventoryImages[$i]->filename)}}" class="d-block w-100" style="max-height: 600px; object-fit: contain">
                    </div>
                @endfor
                
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-black" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-black" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container-sm my-5">
            <h2 style="font-weight: bold">Tangki Timbun BBM</h2>
            <p style="margin-top: -5px">Pelabuhan Tanjung Priok, Surabaya</p>
            <button class="btn btn-primary d-iniline-block border border-1 border-dark rounded-5 px-3 py-1">
                Bekas 
            </button>
        </div>
        
        <div class="container-sm border border-1 border-secondary my-5">
            <div class="row">
                <div class="col-lg-8 col-sm-12  border-end border-secondary p-4">
                    <div class="row g-5">
                        <div class="col-lg-4 col-sm-6">
                            <div class="d-flex gap-3">
                                <i class="fa-regular fa-circle-user fs-2"></i>
                                <div class="d-flex flex-column">
                                    <h5 class="mb-0 text-secondary">PIC</h5>
                                    <p class="fw-bold mb-0">User 1</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="d-flex gap-3">
                                <i class="fa-solid fa-location-dot fs-2"></i>
                                <div class="d-flex flex-column">
                                    <h5 class="mb-0 text-secondary">Location</h5>
                                    <p class="fw-bold mb-0">Tanjung Perak, Surabaya</p>
                                    <p class="fw-bold mb-0">Terminal Nilam</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="d-flex gap-3">
                                <i class="fa-solid fa-border-all fs-2"></i>
                                <div class="d-flex flex-column">
                                <button class="btn btn-primary d-iniline-block border border-1 border-dark rounded-5 px-3 py-1">
                                    Bekas 
                                </button>
                                    <p class="fw-bold mb-0">Layak pakai</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="d-flex gap-3">
                                <i class="fa-solid fa-phone fs-2"></i>
                                <div class="d-flex flex-column">
                                    <h5 class="mb-0 text-secondary">No. PIC</h5>
                                    <p class="fw-bold mb-0">+628xxxxxxxxx</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 p-5 d-flex flex-column gap-5">
                    <button class="btn btn-primary rounded-4 fs-2">
                        Lelang
                    </button>
                    <button class="btn btn-primary rounded-4 fs-2">
                        Reduce
                    </button>
                </div>
            </div>
        </div>

        <div class="container-sm border border-1 border-secondary my-5"></div>
            
        <div class="container-sm d-flex flex-column flex-lg-row justify-content-lg-between mb-5">
            <h2 style="font-weight: bold">Deskripsi</h2>
            <textarea name="" id="" cols="60" rows="10"></textarea>
        </div>

    </div>

    @endsection