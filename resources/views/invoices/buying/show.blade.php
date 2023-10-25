@extends('layouts.master')
@section('css')
    @include('invoices.includes.css.show')
@endsection

@section('title')
    {{ ('تفاصيل فاتورة') }}
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ ('قائمة الفواتير/') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">{{ ('تفاصيل الفاتورة') }}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!--AMA.Sessions div-->
    @include('layouts.AMA.includes.sessions')
    <!--/AMA.Sessions div-->

    <!-- row opened -->
    <div class="row row-sm">

        @include('invoices.includes.show_tabs')

    </div>
    <!-- /row -->

    <!-- delete -->
    @include('invoices.includes.modals.attachment_delete')

@endsection
@section('js')

    @include('invoices.includes.js.show')


    @include('invoices.scripts.show')

@endsection
