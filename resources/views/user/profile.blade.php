@extends('layout.plain')

@section('title', 'Profile')

@section('content')

<div class="container-lg d-flex flex-column align-items-center py-5 px-0">
    <div class="row w-100">
        <div class="col-4">
            <div class="card border-0 shadow p-3 d-flex flex-column justify-content-between" style="min-height: 392px">
                <div> 
                    <div class="d-flex gap-3 mb-4">
                        <i class="fa-regular fa-circle-user fa-3x"></i> 
                        <div class="d-flex flex-column">
                            <h5 class="mb-0">{{$user->name}}</h5>
                            <p class="mb-0">{{$user->username}}</p>
                        </div>
                    </div>
                    <div class="list-group d-flex flex-column gap-2">
                        <a href="#" class="list-group-item list-group-item-action border-0 rounded-3 active" aria-current="true">
                            <h5>Account</h5>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 rounded-3" aria-current="true">
                            <h5>MySpareLog</h5>
                        </a>
                    </div>
                </div>

                <div>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg w-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card border-0 shadow p-3">
                <form action="">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{$user->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="**********" value="{{$user->password}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Divisi</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama divisi" value="{{$user->divisi}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cabang</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="alamat cabang" value="{{$user->cabang}}">
                    </div>
                    <button class="btn btn-lg btn-primary float-end" type="submit">
                        Ubah
                    </button>
                </form>
            </div>
        </div>
    </div>
</div> 


@endsection