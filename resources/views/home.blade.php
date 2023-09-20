@extends('layout.main')

@section('title', 'Home')

@section('content')

    <style>
        .banner {
            padding: 300px 0px;
            background-image: url({{ asset('assets/images/bannerLandingPage.jpeg') }});
            background-size: 100% 100%; /* Use 100% for both width and height */
            background-repeat: no-repeat;
            background-position: center center;
        }

        .banner-textbox{
            background-color: rgba(129, 212, 245, 0.5);
            border: solid 2px #5EA7C3;
            right: 50px;
            width: 40%;
        }

        @media screen and (max-width: 768px) {
            .banner {
                padding: 200px 0px;
            }

            .banner-textbox{
                background-color: rgba(129, 212, 245, 0.5);
                border: solid 2px #5EA7C3;
                width: 90%;
                left:0;
                right:0;
                margin-left: auto;
                margin-right: auto;

            }
        }
    </style>
    <div style="height: 85vh;" class="banner d-flex justify-content-end align-items-center">
        <div class="p-5 position-absolute banner-textbox">
            <h4>About Us</h4>
            <h2>About Our <br>Service</h2>
            <p>We offer a wide range of heavy equpiment, especially for ports, that can relocated according to your needs.</p>
            <button class="btn btn-light rounded-0 border border-2 border-dark p-3"><a href="#mainContent" style="color:black">Explore More</a></button>
        </div>
        
    </div>

    <!-- Banner Ends Here -->
    <div class="container-lg pt-5 mt-5" id="mainContent">
        @if (!$inventories->isEmpty())
            <h2 style="font-weight: bold">Newest</h2>
        @endif
        
        <div class="row row-cols-xl-4 row-cols-md-2 row-cols-sm-1 pt-3">
            @foreach ($inventories as $item)
                <div class="col">
                    <a href="/inventory/{{$item->id}}">
                    <div class="card my-2 rounded-0" style="background-color:#F4F5F7">
                        <img src="{{ asset('storage/inventories/' .$item->foto)}}" width="285px" height="301px" class="card-img-top rounded-0" alt="product-image">
                        <div class="card-body">
                            <h5 class="card-title mb-2">{{$item->nama}}</h5>
                            <h6 class="card-subtitle mt-3 mb-2 text-body-secondary">{{$item->lokasi}}</h6>
                            <div class="btn btn-primary rounded-pill mt-2 px-4">{{$item->kondisi}}</div>
                            <p class="text-end mb-0 mt-2">{{$item->created_at}}</p>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach 
        </div>
        @if (!$inventories->isEmpty())
            <div class="d-grid gap-2 col-4 mx-auto my-5">
                <button class="btn btn-outline-primary" type="button">Show More</button>
            </div>
        @endif
    </div>
        
   
@endsection