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
                                    <td style="width: 150px">
                                        @can('role-list')
                                        <!-- Edit Customer button -->
                                        <a class="modal-effect btn btn-sm btn-primary" data-effect="effect-newspaper" data-toggle="modal" type="button"
                                            data-customer="{{ $item }}"
                                            href="#modaldemo8_show" title="عرض">
                                            {{-- <i class="las la-pen"></i> --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="12" height="15" viewBox="0 0 512 512">
                                                <path fill="#EFC849" d="M7.9,248.7C7.9,111.7,119,0.6,256,0.6c137,0,248.1,111.1,248.1,248.1c0,137-111.1,248.1-248.1,248.1C119,496.8,7.9,385.7,7.9,248.7z"></path><path fill="#F5F5F5" d="M159.1,98.8c-9.2,0-16.7,7.5-16.7,16.7v267.7c0,9.2,7.5,16.7,16.7,16.7h192.4c9.2,0,16.7-7.5,16.7-16.7v-207l-80.7-77.5H159.1z"></path><path fill="#E1E1E1" d="M368.3,176.3h-63.9c-9.2,0-16.7-7.5-16.7-16.7V98.8L368.3,176.3z"></path><g><path fill="#DBF0F5" d="M158.2,323.3l24.2-24.3c0,0,12.9-15.1,23.7-15.8c10.8-0.6,22.5,14.4,22.5,14.4l17.9,17.8l2.9-2.9c0,0,10.5-12.3,19.3-12.8c8.8-0.5,18.3,11.7,18.3,11.7l9.5,9.4c1.5-1.7,9.4-10.2,16.2-10.6c7.5-0.4,15.6,10,15.6,10l24.3,24.1V194.8l-194.3,0.4V323.3z"></path><path fill="#6CC077" d="M328.2,320.3c0,0-8.1-10.4-15.6-10c-6.8,0.4-14.7,8.9-16.2,10.6l-9.5-9.4c0,0-9.5-12.2-18.3-11.7c-8.8,0.5-19.3,12.8-19.3,12.8l-2.9,2.9l-17.9-17.8c0,0-11.7-15-22.5-14.4c-10.8,0.6-23.7,15.8-23.7,15.8l-24.2,24.3v46.6c0,0.9,0.1,1.9,0.3,2.7c0.1,0.8,0.4,1.5,0.6,2.2c1.1,3.1,3.3,5.7,6.1,7.4c2.2,1.3,4.7,2.1,7.3,2.1h165.5c2.3,0,4.5-0.6,6.4-1.6c3.4-1.7,6-4.7,7.2-8.3c0.2-0.7,0.4-1.4,0.6-2.2c0.1-0.8,0.2-1.5,0.2-2.3v-25.5L328.2,320.3z"></path><path fill="#67B8CB" d="M267.2 266.2c0-.2.2-.4.2-.7 0-3.7-4-6.7-9-6.7-.7 0-1.2.2-1.8.3-1.5-2-4.2-3.4-7.4-3.3-4.2 0-7.5 2.3-8.3 5.3-4.1.8-7.1 3.5-7.1 6.8 0 3.1 2.7 5.7 6.5 6.6 1.3 2.9 4.8 4.9 9 4.9 3.8 0 7.1-1.7 8.6-4.2 1 .3 2.1.5 3.2.5 4.4 0 8-2.7 7.9-6C268.9 268.4 268.2 267.2 267.2 266.2zM309.1 274.6c0-.2-.1-.3-.1-.5 0-2.6 2.9-4.8 6.4-4.8.5 0 .9.1 1.3.2 1.1-1.4 3-2.4 5.3-2.4 3 0 5.4 1.6 5.9 3.7 2.9.6 5.1 2.5 5.1 4.8 0 2.2-1.9 4.1-4.6 4.8-.9 2-3.4 3.5-6.4 3.5-2.7 0-5-1.2-6.1-2.9-.7.2-1.5.4-2.3.4-3.1 0-5.7-1.9-5.7-4.2C307.9 276.2 308.4 275.3 309.1 274.6z"></path></g>
                                                </svg>
                                        </a>
                                        @endcan
                                        @can('role-edit')
                                        <!-- Edit Customer button -->
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-newspaper" data-toggle="modal" type="button"
                                            data-customer="{{ $item }}"
                                            href="#modaldemo8_edit" title="تعديل">
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
        @include('stocks.modals')
    </div>
    <!-- row closed -->
@endsection
@section('js')
<!------------------------------------------AMA.Customer js------------------------------------------>
<script src={{ URL::asset("assets/js/scripts/stocks/scripts.js") }}></script>
<!--_______________________________________AMA.Customer js__________________________________________-->

<!--Internal  Datepicker js -->
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<!-- Internal Select2 js-->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- Internal Input tags js-->
<script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
<!--- Tabs JS-->
<script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
<script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
<!--Internal  Clipboard js-->
<script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
<!-- Internal Prism js-->
<script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
@endsection
