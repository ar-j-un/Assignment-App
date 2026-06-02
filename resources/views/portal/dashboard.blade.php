@extends('layouts.app')

@section('title', 'Overview')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary p-3 rounded position-relative overflow-hidden">
                <div class="inner">
                    <h3 class="fw-bold fs-2">150</h3>
                    <p class="mb-0">New Orders</p>
                </div>
                <div class="small-box-icon position-absolute end-0 top-0 m-3 opacity-25">
                    <i class="fas fa-shopping-cart fa-3x"></i>
                </div>
            </div>
        </div>
    </div>
@endsection