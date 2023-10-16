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
            <img src="{{asset('storage/inventories/'.$inventory->foto)}}" width="285px" height="301px" class="card-img-top rounded-0" alt="product-image">
            <div class="card-body">
            <h5 class="card-title mb-2">{{$inventory->nama}}</h5>
            <h6 class="card-subtitle mt-3 mb-2 text-body-secondary">{{$inventory->lokasi}}</h6>
            <div class="btn btn-primary rounded-pill mt-2 px-4 text-capitalize">{{$inventory->kondisi}}</div>
            <p class="text-end mb-0 mt-2">{{$inventory->created_at}}</p>
            </div>
        </div>
        
        <div class="border border-1 border-secondary px-4 py-2">
            <div class="d-flex gap-5 justify-content-around" style="height: fit-content">
                <div class="d-flex gap-2 my-3">
                    <div class="d-flex gap-3 bg-secondary-subtle p-3 rounded-4">
                        <i class="fa-regular fa-circle-user fs-2"></i>
                        <div class="d-flex flex-column">
                            <h5 class="fw-bold">PIC</h5>
                            <p class="mb-0">{{$inventory->pic_name}}</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 bg-secondary-subtle p-3 rounded-4">
                        <i class="fa-solid fa-phone fs-2"></i>
                        <div class="d-flex flex-column">
                            <h5 class="fw-bold">Phone</h5>
                            <p class="mb-0">{{$inventory->pic_phone}}</p>
                        </div>
                    </div>
                </div>
            </div>
           
            <form class="d-flex flex-column gap-4" action="submit/request relokasi">
                <label for="nama">
                    Name
                    <input name="nama" type="text" class="form-control">
                </label>
                <label for="nama">
                    Request Address
                    <input name="nama" type="text" class="form-control">
                </label>
                <label for="nama">
                    Upload File Kebutuhan Relokasi
                    <input name="nama" type="file" class="form-control">
                </label>
                <button type="submit" class="btn btn-primary btn-lg px-5 py-2 mt-5 rounded-4 w-100">
                    Order
                </button>
            </form>
           
        </div>
    </div>
@endsection