@extends('layouts.master')
@section('css')

@endsection


@section('page-header')
    {{ __('traders') }}
@endsection


@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">
                            @can('role-create')
                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-newspaper" data-toggle="modal" href="#modaldemo8_create">{{ __('اضافة عميل') }}</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="show_alert"></div>
                    <div class="table_div">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0 text-center text-danger">{{ __('id') }}</th>
                                    <th class="border-bottom-0 text-center text-danger">{{ __('الاسم') }}</th>
                                    <th class="border-bottom-0 text-center text-danger">{{ __('الرقم القومي') }}</th>
                                    <th class="border-bottom-0 text-center text-danger">{{ __('السن') }}</th>
                                    <th class="border-bottom-0 text-center text-danger">{{ __('الهاتف 1') }}</th>
                                    <th class="border-bottom-0 text-center text-danger">{{ __('البريد الالكتروني') }}</th>
                                    <th class="border-bottom-0 text-center text-danger">{{ __('النوع') }}</th>
                                    <th class="border-bottom-0 text-center text-danger">{{ __('العمليات') }}</th>
                                </tr>
                            </thead>
                            <tbody id="amaDataTable">
                                @foreach ($data as $item)
                                <tr>
                                    <td class="border-bottom-0 text-center">{{ $item->id }}</td>
                                    <td class="border-bottom-0 text-center">{{ $item->name }}</td>
                                    <td class="border-bottom-0 text-center">{{ $item->national_id }}</td>
                                    <td class="border-bottom-0 text-center">{{ $item->age }}</td>
                                    <td class="border-bottom-0 text-center">{{ $item->phone1 }}</td>
                                    <td class="border-bottom-0 text-center">{{ $item->email }}</td>
                                    <td class="border-bottom-0 text-center">
                                        {{ ($item->type == 1) ? 'تاجر' : (($item->type == 2) ? 'عميل' : (($item->type == 3) ? 'مزدوج' : 'غير محدد'))}}
                                    </td>
                                    <td>
                                        @can('role-edit')
                                        <!-- Edit Customer button -->
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-newspaper" data-toggle="modal" type="button"
                                            data-id="{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-national_id="{{ $item->national_id }}"
                                            data-age="{{ $item->age }}"
                                            data-phone1="{{ $item->phone1 }}"
                                            data-email="{{ $item->email }}"
                                            data-type="{{ $item->type }}"
                                            href="#modaldemo8_edit">
                                            <i class="las la-pen"></i>
                                        </a>
                                        @endcan

                                        @can('role-delete')
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-newspaper" data-toggle="modal" type="button"
                                            data-id="{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            href="#modaldemo8_delete" title="حذف">
                                            <i class="las la-trash"></i>
                                        </a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('customers.modals')
    </div>
    <!-- row closed -->
@endsection


@section('js')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>

{{-- @include('customers.scripts.create') --}}
<script src={{ URL::asset("assets/js/scripts/customers/scripts.js") }}></script>

@endsection
