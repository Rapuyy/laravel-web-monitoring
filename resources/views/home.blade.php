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
            </div>
        </div>
    </div>
</div>
@endsection