@extends('layout.main')

@section('title', 'Product')

@section('content')

<style>
        .banner {
            padding-top: 400px;
            background-image: url({{ asset('assets/images/walp.jpg') }});
            background-size: cover; /* Use 100% for both width and height */
            background-repeat: no-repeat;
            background-position: center center;
        }
        @media screen and (max-width: 768px) {
            .banner {
                padding: 200px 0px;
            }
        }
    </style>
    <div class="banner">
    </div>
    <div style="background-color:#0E73B9;color:white;height:100px;">
        <div class="container">
            <div class="row">
                <div class="col" style="margin-top:30px;font-size:24px">
                    Search Result : 
                </div>
                <div class="col" style="display:flex;justify-content:flex-end;margin-top:20px">
                    <label style="margin-top:15px;margin-right:10px">Filter</label>
                    <input type="text" placeholder="Default" id="" style="border:0;border-radius:10px;width:188px;height:55px;padding-left:20px">
                </div>
            </div>
        </div>
    </div>

   
    <div class="container mt-3">
        @if ($inventories->isEmpty())
            <h1>Nama barang tidak ditemukan...</h1>
        @else
        <div class="row row-cols-xl-4 row-cols-md-2 row-cols-sm-1">
            @foreach ($inventories as $item)
                <div class="col">
                    <div class="card my-2 rounded-0" style="background-color:#F4F5F7">
                        <img src="{{ asset('storage/inventories/' .$item->foto)}}" width="285px" height="301px" class="card-img-top rounded-0" alt="product-image">
                        <div class="card-body">
                        <h5 class="card-title mb-2">{{$item->nama}}</h5>
                        <h6 class="card-subtitle mt-3 mb-2 text-body-secondary">{{$item->lokasi}}</h6>
                        <div class="btn btn-primary rounded-pill mt-2 px-4">{{$item->kondisi}}</div>
                        <p class="text-end mb-0 mt-2">{{$item->created_at}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>

    <div class="d-flex justify-content-center">
        <div class="btn-group btn-group-lg gap-5 my-5" role="group">
            <button type="button" class="btn btn-secondary">1</button>
            <button type="button" class="btn btn-secondary">2</button>
            <button type="button" class="btn btn-secondary">3</button>
        </div>
    </div>
    

    @endsection