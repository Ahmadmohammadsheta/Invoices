@extends('layouts.master')
@section('css')
    @include('layouts.AMA.css.table')
@endsection
@section('title')
    {{ __('المنتجات') }}
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('المنتجات') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">{{ __('المنتجات') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!--AMA.Sessions div-->
    @include('layouts.AMA.includes.sessions')
    <!--/AMA.Sessions div-->
    <!-- row -->
    <div class="row">

        @include('products.includes.table')

        @include('products.modals.add')
        @include('products.modals.edit')
        @include('products.modals.delete')

    </div>
    <!-- row closed -->
@endsection
@section('js')

    @include('layouts.AMA.scripts.table')

    @include('products.scripts.scripts')

@endsection
