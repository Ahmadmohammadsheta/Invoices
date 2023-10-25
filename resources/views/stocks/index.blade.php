@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
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
                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-newspaper" data-toggle="modal" href="#modaldemo8">{{ __('اضافة مخزون') }}</a>
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
                                    <th class="border-bottom-0 text-center text-danger">{{ __('اسم المنتج') }}</th>
                                    <th class="border-bottom-0 text-center text-danger">{{ __('الكمية') }}</th>
                                    <th class="border-bottom-0 text-center text-danger">{{ __('السعر') }}</th>
                                    <th class="border-bottom-0 text-center text-danger">{{ __('سعر الشراء') }}</th>
                                    <th class="border-bottom-0 text-center text-danger">{{ __('اللون') }}</th>
                                    <th class="border-bottom-0 text-center text-danger">{{ __('الحجم') }}</th>
                                    <th class="border-bottom-0 text-center text-danger">{{ __('العمليات') }}</th>
                                </tr>
                            </thead>
                            <tbody id="amaDataTable">
                                @foreach ($data as $item)
                                <tr>
                                    <td class="border-bottom-0 text-center">{{ $item->id }}</td>
                                    <td class="border-bottom-0 text-center">{{ $item->product->name }}</td>
                                    <td class="border-bottom-0 text-center">{{ $item->quantity }}</td>
                                    <td class="border-bottom-0 text-center">{{ $item->price }}</td>
                                    <td class="border-bottom-0 text-center">{{ $item->buying_price }}</td>
                                    <td class="border-bottom-0 text-center">{{ $item->color_id }}</td>
                                    <td class="border-bottom-0 text-center">{{ $item->size_id }}</td>
                                    <td>
                                        @can('role-edit')
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                data-description="{{ $item->description }}" data-toggle="modal"
                                                href="#exampleModal2" title="تعديل"><i class="las la-pen"></i></a>
                                        @endcan

                                        @can('role-delete')
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                    class="las la-trash"></i></a>
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
        @include('stocks.modals.create')
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

        // $(".add_item_btn").click(function (e) {
        //     e.preventDefault();
        //     $("#show_item").append(`
        //         <div class="row append_item">

        //             <div class="col-md-2 mb-3">
        //                 <input type="text" name="product_id[]" id="" class="form-control" placeholder="Product" required>
        //             </div>

        //             <div class="col-md-1 mb-3">
        //                 <input type="text" name="quantity[]" id="" class="form-control" placeholder="Quantity" required>
        //             </div>

        //             <div class="col-md-1 mb-3">
        //                 <input type="text" name="price[]" id="" class="form-control" placeholder="Price" required>
        //             </div>

        //             <div class="col-md-2 mb-3">
        //                 <input type="text" name="buying_price[]" id="" class="form-control" placeholder="Buying price" required>
        //             </div>

        //             <div class="col-md-1 mb-3">
        //                 <input type="text" name="color_id[]" id="" class="form-control" placeholder="Color" required>
        //             </div>

        //             <div class="col-md-1 mb-3">
        //                 <input type="text" name="size_id[]" id="" class="form-control" placeholder="Size" required>
        //             </div>

        //             <div class="col-md-2 mb-3">
        //                 <input type="text" name="description[]" id="" class="form-control" placeholder="Description" required>
        //             </div>

        //             <div class="col-md-1 mb-3 d-grid">
        //                 <button class="btn btn-danger remove_item_btn">{{ __('-') }}</button>
        //             </div>
        //         </div>
        //     `);
        // });
        // $(document).on('click', '.remove_item_btn', function(e) {
        //     e.preventDefault();
        //     let row_item = $(this).parent().parent();
        //     $(row_item).remove();
        // });

        // // Ajax request to insert multiple form data
        // $("#add_form").submit(function(e) {
        //     e.preventDefault();
        //     $("#add_btn").val('Adding......');
        //     $.ajax({
        //         url: "{{ route('stocks.store') }}",
        //         type:"POST",
        //         // method: 'post',
        //         data: $(this).serialize(),
        //         success: function(response) {
        //             $("#add_btn").val('Add');
        //             $("#add_form")[0].reset();
        //             $(".append_item").remove();
        //             $(".table_div").load(location.href+ ' .table_div');
        //             $("#show_alert").html(`
        //                 <div class="alert alert-success role="alert">${ response }</div>
        //             `);
        //             $("#modaldemo8").modal('hide');
        //         }
        //     });
        // });
    });
</script>
@include('stocks.scripts.create')
@endsection
