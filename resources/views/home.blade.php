@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')
<div class="container">
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Dashboard</h3>
            </div>
            <div class="card-body">
                <h5>Selamat datang di halaman dashboard, <strong>{{ Auth::user()->name }}</strong></h5>
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 justify-content-center">
                <a href="{{ route('user.index') }}" class="btn btn-info">Manajemen Pengguna</a>
                <a href="{{ route('camera') }}" class="btn btn-warning">Test Camera</a>
            </div>
        </div>
    </div>
</div>
@endsection