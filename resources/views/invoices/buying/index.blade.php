@extends('layouts.master')

@section('title')
{{ __('قائمة الفواتير') }}
@stop

@section('css')
    @include('invoices.includes.css.index')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('الفواتير') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">{{ __('قائمة الفواتير') }}</span>
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
        <!--div-->
        @include('invoices.includes.table')
        <!--/div-->
    </div>
    <!-- row closed -->
@endsection

@section('js')

    @include('invoices.includes.js.index')

    @include('invoices.scripts.index')

@endsection
