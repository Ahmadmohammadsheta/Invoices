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
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
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
                <div class="card-body">
                    <form action="{{ route('stocks.store') }}" id="add_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="show_item">
                            <div class="row">

                                <div class="col-md-2 mb-3">
                                    <label for="product_id" class="form-label text-warning">{{ __('Products') }}</label>
                                    <select id="product_id" name="product_id[]" class="form-control text-center text-danger SlectBox" style="font-size: 1.2rem" aria-label="Default select example">
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}"  style="font-size: 1.2rem">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" name="product_id[]" id="" class="form-control" placeholder="Product" required> --}}
                                </div>

                                <div class="col-md-1 mb-3">
                                    <label for="quantity" class="form-label text-warning">{{ __('Quantity') }}</label>
                                    <input type="text" name="quantity[]" id="" class="form-control" placeholder="Quantity" required>
                                </div>

                                <div class="col-md-1 mb-3">
                                    <label for="price" class="form-label text-warning">{{ __('Price') }}</label>
                                    <input type="text" name="price[]" id="price" class="form-control" placeholder="Price" required>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="buying_price" class="form-label text-warning">{{ __('Buying price') }}</label>
                                    <input type="text" name="buying_price[]" id="" class="form-control" placeholder="Buying price" required>
                                </div>

                                <div class="col-md-1 mb-3">
                                    <label for="color_id" class="form-label text-warning">{{ __('Color') }}</label>
                                    <input type="text" name="color_id[]" id="" class="form-control" placeholder="Color" required>
                                </div>

                                <div class="col-md-1 mb-3">
                                    <label for="size_id" class="form-label text-warning">{{ __('Size') }}</label>
                                    <input type="text" name="size_id[]" id="" class="form-control" placeholder="Size" required>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="description" class="form-label text-warning">{{ __('Description') }}</label>
                                    <input type="text" name="description[]" id="" class="form-control" placeholder="Description" required>
                                </div>

                                <div class="col-md-1 mb-3 d-grid">
                                    <label for="" class="form-label text-warning">{{ __('Add row') }}</label>
                                    <button class="btn btn-success add_item_btn">{{ __('+') }}</button>
                                </div>

                            </div>
                        </div>
                        <div class="submit_btn">
                            <input type="submit" value="Add" class="btn btn-primary w-25" id="add_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {


        $(".add_item_btn").click(function (e) {
            e.preventDefault();

            $("#show_item").append(`
                <div class="row append_item">

                    <div class="col-md-2 mb-3">
                        <select id="product_id" name="product_id[]" class="form-control text-center text-danger SlectBox" style="font-size: 1.2rem" aria-label="Default select example">
                            @foreach ($products as $product)
                            <option  style="font-size: 1.2rem">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-1 mb-3">
                        <input type="text" name="quantity[]" id="" class="form-control" placeholder="Quantity" required>
                    </div>

                    <div class="col-md-1 mb-3">
                        <input type="text" name="price[]" id="price" class="form-control" placeholder="Price" required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <input type="text" name="buying_price[]" id="" class="form-control" placeholder="Buying price" required>
                    </div>

                    <div class="col-md-1 mb-3">
                        <input type="text" name="color_id[]" id="" class="form-control" placeholder="Color" required>
                    </div>

                    <div class="col-md-1 mb-3">
                        <input type="text" name="size_id[]" id="" class="form-control" placeholder="Size" required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <input type="text" name="description[]" id="" class="form-control" placeholder="Description" required>
                    </div>

                    <div class="col-md-1 mb-3 d-grid">
                        <button class="btn btn-danger remove_item_btn">{{ __('X') }}</button>
                    </div>
                </div>
            `);
        });
        $(document).on('click', '.remove_item_btn', function(e) {
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });
        $('select[name="product_id[]"]').on('change', function() {
            var productId = $(this).val();
            if (productId) {
                $.ajax({
                    url: "{{ URL::to('products/') }}/" + productId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                    // alert('AJAX loaded', data.price);
                        $('#price').empty();
                        $('#price').val(data.data.price);
                        console.log(data.data.price);
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });


        // $('#product_id').on('change', function() {
        //     // alert('AJAX loaded 1');
        //     var productId = $(this).val();
        //     if (productId) {
        //         $.ajax({
        //             url: "{{ URL::to('products/') }}/" + productId,
        //             type: "GET",
        //             dataType: "json",
        //             success: function(data) {
        //             // alert('AJAX loaded', data.price);
        //                 $('#price').empty();
        //                 $('#price').val(data.price);
        //                 console.log(data.price);
        //             },
        //         });

        //     } else {
        //         console.log('AJAX load did not work');
        //     }
        // });
    });
</script>
@endsection
