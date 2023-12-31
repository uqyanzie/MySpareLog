@extends('layout.admin')

@section('title', 'Admin - Users Data')

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
                            <h5 class="mb-0">{{$me->name}}</h5>
                            <p class="mb-0">{{$me->username}}</p>
                        </div>
                    </div>
                    <a href="/admin/users" class="list-group-item d-inline-block list-group-item-action border-0 rounded-3 active">
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
                <div class="d-flex gap-2 mb-3">
                    <a href="{{route('admin.users.download-excel')}}" class="btn btn-success">Download Excel</a>
                    <a href="/admin/create-user" class="btn btn-secondary">Create New User</a>
                    @if (session('current_session'))
                        <div class="ms-auto d-flex gap-2">
                            <div class="rounded-3 bg-warning-subtle p-2 px-4 ms-auto">
                                <p class="mb-0 fw-semibold">Session Used : {{session('current_session')->username}}</p> 
                            </div>
                            <a href="{{route('admin.exit_session')}}" class="btn btn-danger rounded-5">Exit Session</a>
                        </div>
                    @else
                        <div class="rounded-3 bg-warning-subtle p-2 px-4 ms-auto">
                            <p class="mb-0 fw-semibold">No Session Used</p>
                        </div>
                    @endif
                </div>
                <table class="table text-center">
                    <thead>
                        <tr class="table-info">
                            <th>ID</th>
                            <th>Role</th>
                            <th>Username</th>
                            <th>Divisi</th>
                            <th>Cabang</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->divisi}}</td>
                            <td>{{$user->cabang}}</td>
                            <td>
                                @if ($user->status == 'aktif')
                                <span class="badge rounded-pill text-bg-success px-3">
                                    <h6 class="mb-0">{{$user->status}}</h6>
                                </span>
                                @else
                                <span class="badge rounded-pill text-bg-danger">
                                    <h6 class="mb-0">{{$user->status}}</h6>
                                </span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex px-3 justify-content-around">
                                    @if($user->id != $me->id && $user->role != 'admin')
                                        <form action="{{route('admin.change_session', $user->id)}}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-warning rounded-5 px-4 text-white fw-semibold">Use Session</button>
                                        </form>  
                                    @endif
                                    <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-primary rounded-5 px-4" style="height: fit-content;">
                                        Edit    
                                    </a>
                                    @if ($user->id != $me->id)
                                        <form action="{{route('admin.user.delete', $user->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger rounded-5 px-4">Hapus</button>
                                        </form>
                                    @endif
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