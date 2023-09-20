@extends('layout.plain')

@section('title', 'Iklan')


<style>
    .content {
        display: none;
        align-items: center;
        font-weight: 400;
        font-size: 20px;
        color: rgba(102, 102, 102, 1);
        border: 1px solid #ccc;
        height: fit-content;
    }

    .content.active {
        display: flex;
        flex-direction: column;
    }

    .chevron-icon {
        position: absolute;
        right: 10px;
    }
</style>

@section('content')

  <div class="container-sm p-0 my-5">
    <div class="row mb-3">
        <div class="col-12 p-3 d-flex align-items-center rounded-3 fs-4 shadow shadow-lg bg-light">
            Plih Kategori
        </div>
    </div>
    
    <div class="row px-2">
        <div class="col-6 d-flex flex-column p-0 gap-3">
            <div class="btn-group dropend">
                <button type="button" class="p-3 fs-4 d-flex justify-content-between align-items-center btn btn-light text-secondary shadow-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="-1,10">
                    <span><i class="fas fa-screwdriver-wrench"></i> Peralatan Faspel</span>
                </button>
                <ul class="dropdown-menu w-100 p-0 m-0 fs-4 border-0">
                    <li class="p-3 dropdown-item mb-3 rounded-3 shadow-sm">
                        <a class="text-decoration-none text-secondary" href="#">
                            CC
                        </a>
                    </li>
                    <li class="p-3 dropdown-item mb-3 rounded-3 shadow-sm">
                        <a class="text-decoration-none text-secondary" href="#">
                            RTG
                        </a>
                    </li>
                </ul>
            </div>
            <div class="btn-group dropend">
                <button type="button" class="p-3 fs-4 d-flex justify-content-between align-items-center btn btn-light text-secondary shadow-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="-1,10">
                    <span><i class="fas fa-toolbox"></i> Instalasi Faspel</span>
                </button>
                <ul class="dropdown-menu w-100 p-0 m-0 fs-4 border-0">
                    <li class="p-3 dropdown-item mb-3 rounded-3 shadow-sm">
                        <a class="text-decoration-none text-secondary" href="#">
                            Kubikel
                        </a>
                    </li>
                    <li class="p-3 dropdown-item mb-3 rounded-3 shadow-sm">
                        <a class="text-decoration-none text-secondary" href="#">
                            Kabel
                        </a>
                    </li>
                </ul>
            </div>
            <div class="btn-group dropend">
                <button type="button" class="p-3 fs-4 d-flex justify-content-between align-items-center btn btn-light text-secondary shadow-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="-1,10">
                    <span><i class="fas fa-ship"></i> Fasilitas Pelabuhan</span>
                </button>
                <ul class="dropdown-menu w-100 p-0 m-0 rounded-0 fs-4 border-0">
                    <li class="p-3 dropdown-item mb-3 shadow-sm">
                        <a class="text-decoration-none text-secondary" href="#">
                            Fender
                        </a>
                    </li>
                    <li class="p-3 dropdown-item mb-3 shadow-sm">
                        <a class="text-decoration-none text-secondary" href="#">
                            Bolder
                        </a>
                    </li>
                </ul>
            </div>
            <div class="btn-group dropend">
                <button type="button" class="p-3 fs-4 d-flex justify-content-between align-items-center btn btn-light text-secondary shadow-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="-1,10">
                    <span><i class="far fa-building"></i> Rumah Tangga & Umum</span>
                </button>
                <!-- <ul class="dropdown-menu w-100 p-0 m-0 rounded-0 fs-4">
                    
                </ul> -->
            </div>
            <div class="btn-group dropend">
                <button type="button" class="p-3 fs-4 d-flex justify-content-between align-items-center btn btn-light text-secondary shadow-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="-1,10">
                    <span><i class="far fa-folder"></i> Kearsipan/Keuangan</span>
                </button>
                <!-- <ul class="dropdown-menu w-100 p-0 m-0 rounded-0 fs-4">
                    
                </ul> -->
            </div>
        </div>
    </div>
</div>

@endsection