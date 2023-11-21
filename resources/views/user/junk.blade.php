@extends('layout.admin')

@section('title', 'Profile')

<style>
    .bg-blue-light-gradient{
        background: linear-gradient(90.21deg, #0E73B9 27.53%, #2FB6E9 66.07%);
    }
</style>

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap" style="height: 85%">
        <div class="col-auto px-0">
            <div id="sidebar" class="collapse collapse-horizontal border-end p-3">
                <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start h-100 gap-3 d-flex flex-column" style="min-width: 250px;">
                    <div class="d-flex gap-3 mb-2">
                        <i class="fa-regular fa-circle-user fa-3x"></i> 
                        <div class="d-flex flex-column">
                            <h5 class="mb-0">{{$user->name}}</h5>
                            <p class="mb-0">{{$user->username}}</p>
                        </div>
                    </div>
                    <a href="/profile" class="list-group-item d-inline-block list-group-item-action border-0 rounded-3">
                        <h5 class="mb-0">Account</h5>
                    </a>
                    <a class="list-group-item d-inline-block list-group-item-action border-0 rounded-3 active"  data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <h5 class="mb-0">MySpareLog</h5>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div class="list-group border-0 rounded-0 text-sm-start gap-3">
                            <a href="/my-inventories" class="list-group-item d-inline-block list-group-item-action border-0 rounded-3">
                                <h5 class="mb-0">Iklan Saya</h5>
                            </a>
                            <a href="/need-actions" class="list-group-item d-inline-block list-group-item-action border-0 rounded-3">
                                <h5 class="mb-0">Perlu Tindakan</h5>
                            </a>
                            <a href="/completed" class="list-group-item d-inline-block list-group-item-action border-0 rounded-3">
                                <h5 class="mb-0">Selesai</h5>
                            </a>
                            <a href="/my-inventories/lelang" class="list-group-item d-inline-block list-group-item-action border-0 rounded-3">
                                <h5 class="mb-0">Lelang</h5>
                            </a>
                            <a href="/my-inventories/junk" class="list-group-item d-inline-block list-group-item-action border-0 rounded-3 active">
                                <h5 class="mb-0">Sampah</h5>
                            </a>
                        </div>
                    </div>
                    <a class="list-group-item list-group-item-danger d-inline-block list-group-item-action border-0 rounded-3 mt-auto" href="/logout">
                        <h5 class="mb-0">Logout</h5>
                    </a>
                </div>
            </div>
        </div>
        <main class="col ps-md-2 pt-2">
            <div class="card border-0 shadow p-4">
                <div class="d-block mb-3">
                    <h1>{{$title}}</h1>
                </div>
                <table class="table">
                    <thead>
                        <tr class="table-info">
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>   
                    </thead>
                    <tbody>
                        @foreach ($inventories as $inventory)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$inventory->nama}}</td>
                            <td>{{$inventory->stok}}</td>
                            <td>{{$inventory->status}}</td>
                            <td>
                                <div class="d-flex gap-3 justify-content-center">
                                    <button class="btn btn-primary rounded-5 px-4">Edit</button>
                                    <button class="btn btn-outline-primary rounded-5 px-4">View</button>
                                    <button class="btn btn-danger rounded-5 px-4">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
<script>
    function toggleSidebar(e) {
        e.classList.toggle("fa-xmark")
        e.classList.toggle("fa-bars")
    }
</script>