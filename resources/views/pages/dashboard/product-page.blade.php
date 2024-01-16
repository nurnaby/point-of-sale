@extends('layout.side-layout')
@section('content')
    @include('components.dashboard.product-list')
    @include('components.dashboard.product-create')
    @include('components.dashboard.product-delete')
    @include('components.dashboard.product-update')
@endsection
