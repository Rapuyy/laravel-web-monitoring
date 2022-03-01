@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('css')
<style>
.card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
}
</style>
@endsection

@section('content')
<div class="container h-100">
    <div class="row h-100">
        <div class="col-sm-6">
            <div class="card h-200" style="">
                <iframe class="card-img-top" src="http://127.0.0.1:5000/" frameborder="0"></iframe>
                <div class="card-footer">
                  Pemakaian Masker
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card" style="">
                <iframe class="card-img-top" src="http://127.0.0.1:5000a/" frameborder="0"></iframe>
                <div class="card-footer">
                  Suhu
                </div>
            </div>
        </div>
    </div>
</div>
@endsection