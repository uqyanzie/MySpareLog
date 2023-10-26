@extends('layout.admin')

@section('title', 'Admin Dashboard')

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
                <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start h-100 gap-3" style="min-width: 250px;">
                    <div class="d-flex gap-3 mb-2">
                        <i class="fa-regular fa-circle-user fa-3x"></i> 
                        <div class="d-flex flex-column">
                            <h5 class="mb-0">{{$user->name}}</h5>
                            <p class="mb-0">{{$user->username}}</p>
                        </div>
                    </div>
                    <a href="/admin/users" class="list-group-item d-inline-block list-group-item-action border-0 rounded-3">
                        <h5 class="mb-0">Data User</h5>
                    </a>
                    <a href="/admin/inventories" class="list-group-item d-inline-block list-group-item-action border-0 rounded-3">
                        <h5 class="mb-0">Data Barang</h5>
                    </a>
                    <a class="list-group-item list-group-item-danger d-inline-block list-group-item-action border-0 rounded-3 mt-auto" href="/logout">
                        <h5 class="mb-0">Logout</h5>
                    </a>
                </div>
            </div>
        </div>
        <main class="col ps-md-2 pt-2">
            <div class="card border-0 shadow p-4">
                <h1>
                    Hallo, {{$user->name}}
                </h1>
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