@extends('layout.main')

@section('title', 'Checkout')

@section('content')

    <!-- Page Content -->
    <!-- Information Here -->
    <div class="bg-blue-white-gradient text-center d-flex align-items-center justify-content-center pt-5" style="height:50vh;">
        <h1>
            Checkout
        </h1>
    </div>
    <!-- Information Ends Here -->

    <h4 class="fw-bold text-center">Order Details</h4>
    <div class="container-md d-flex flex-column gap-3 flex-lg-row justify-content-around my-5">
        <div class="card my-2 rounded-0" style="background-color:#F4F5F7">
            <img src="{{asset('storage/inventories/pallet.jpg')}}" width="285px" height="301px" class="card-img-top rounded-0" alt="product-image">
            <div class="card-body">
            <h5 class="card-title mb-2">Hand Pallet</h5>
            <h6 class="card-subtitle mt-3 mb-2 text-body-secondary">Pelabuhan Tanjung Priok, Jakarta</h6>
            <div class="btn btn-primary rounded-pill mt-2 px-4">Bekas</div>
            <p class="text-end mb-0 mt-2">24 Juli 2023</p>
            </div>
        </div>
        
        <div class="border border-1 border-secondary px-4 py-2">
            <div class="d-flex justify-content-evenly align-items-center gap-5" style="height: fit-content">
                <div class="d-flex flex-column gap-5 my-3">
                    <div class="d-flex gap-3">
                        <i class="fa-regular fa-circle-user fs-2"></i>
                        <div class="d-flex flex-column">
                            <h5 class="fw-bold">User</h5>
                            <p class="mb-0">PIC 1</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <i class="fa-solid fa-phone fs-2"></i>
                        <div class="d-flex flex-column">
                            <h5 class="fw-bold">User</h5>
                            <p class="mb-0">+628xxxxxxxxx</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column gap-5 my-3">
                    <a class="btn btn-outline-primary btn-lg px-5 py-2 rounded-4 w-100">
                        Chat PIC
                    </a>
                    <form action="submit/request relokasi">
                        <button type="submit" class="btn btn-primary btn-lg px-5 py-2 rounded-4 w-100">
                            Order
                        </button>
                    </form>
                </div>
            </div>
            <div class="container d-flex flex-column gap-3 my-3">
                <label for="nama" style="font-weight:500;font-size:16px;margin-left:-10px">
                    Name
                    <input name="nama" type="text" class="form-control">
                </label>
                <label for="nama" style="font-weight:500;font-size:16px;margin-left:-10px">
                    Request Address
                    <input name="nama" type="text" class="form-control">
                </label>
                <label for="nama" style="font-weight:500;font-size:16px;margin-left:-10px">
                    Upload File Kebutuhan Relokasi
                    <input name="nama" type="file" class="form-control">
                </label>
            </div>
        </div>
    </div>
@endsection