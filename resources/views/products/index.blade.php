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
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">
                    @can('role-create')
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#exampleModal">{{ __('اضافة منتج') }}</a>
                    @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">{{ __('id') }}</th>
                                    <th class="border-bottom-0">{{ __('اسم المنتج') }}</th>
                                    <th class="border-bottom-0">{{ __('الكود') }}</th>
                                    <th class="border-bottom-0">{{ __('الكود الدولي') }}</th>
                                    <th class="border-bottom-0">{{ __('السعر') }}</th>
                                    <th class="border-bottom-0">{{ __('اسم القسم') }}</th>
                                    <th class="border-bottom-0">{{ __('ملاحظات') }}</th>
                                    <th class="border-bottom-0">{{ __('العمليات') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($data as $product)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->code }}</td>
                                        <td>{{ $product->barecode }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->section->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>
                                            @include('products.operationsTableButtons')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        @include('products.modals')

    </div>
    <!-- row closed -->
@endsection
@section('js')

<!--AMA.Product js -->
<script src={{ URL::asset("assets/js/scripts/products/scripts.js") }}></script>


    @include('layouts.AMA.scripts.table')

@endsection
