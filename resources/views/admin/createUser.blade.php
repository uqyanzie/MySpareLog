@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid p-3">
    <div class="card p-5">
        <h1 class="mb-4 fw-bold">Tambah Data User</h1>
        <form action="{{ route('admin.user.store') }}" method="POST" class="row g-3">
            @csrf
            <label for="email" class="col-12 col-lg-6">
                <h5 class="ms-2">Email</h5>
                <input id="email" name="email" type="email" class="form-control">
            </label>
            <label for="password" class="col-12 col-lg-6">
                <h5 class="ms-2">Password</h5>
                <input id="password" name="password" type="password" class="form-control">
            </label>
            <label for="username" class="col-12 col-lg-6">
                <h5 class="ms-2">Username</h5>
                <input id="username" name="username" type="text" class="form-control">
            </label>
            <label for="name" class="col-12 col-lg-6">
                <h5 class="ms-2">Nama</h5>
                <input id="name" name="name" type="text" class="form-control">
            </label>
            <label for="role" class="col-12 col-lg-6">
                <h5 class="ms-2">Role</h5>
                <select name="role" id="role" class="form-select">
                    <option value="" class="text-secondary" selected>-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="user">Regular User</option>
                </select>
            </label>
            <label for="phone" class="col-12 col-lg-6">
                <h5 class="ms-2">No. Telepon</h5>
                <input id="phone" name="phone" type="number" pattern="^(?:0|\(?\+62\)?\s?|08\s?)[1-9](?:[\.\-\s]?\d\d){4}$" class="form-control" required>
            </label>
            <label for="divisi" class="col-12 col-lg-6">
                <h5 class="ms-2">Divisi</h5>
                <select name="divisi" id="divisi" class="form-select">
                    <option value="" class="text-secondary" selected>-- Pilih Divisi --</option>
                    <option value="Teknik">Teknik</option>
                    <option value="Operasional">Operasional</option>
                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                </select>
            </label>
            <label for="cabang" class="col-12 col-lg-6">
                <h5 class="ms-2">Lokasi</h5>
                <select name="cabang" id="cabang" class="form-select">
                    <option value="" class="text-secondary" selected>-- Pilih Lokasi --</option>
                    <option value="Terminal Nilam">Terminal Nilam</option>
                    <option value="Terminal Jamrud">Terminal Jamrud</option>
                    <option value="Pelindo Subreg Jawa">Pelindo Subreg Jawa</option>
                </select>
            </label>
            <button type="submit" class="btn btn-success ms-auto w-25 mt-5">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection

<style>
   /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }
</style>
