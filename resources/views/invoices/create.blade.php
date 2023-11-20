@extends('layouts.master')
@section('css')
    @include('invoices.includes.css.add')
@endsection
@section('title')
    @if ($type == 'buy')
    {{ __('اضافة فاتورة مشتريات') }}
    @else
    {{ __('اضافة فاتورة مبيعات') }}
    @endif
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('الفواتير') }}</h4>
                @if ($type == 'buy')
                <span class="text-muted mt-1 tx-20 mr-2 mb-0">/{{ __(' فاتورة مشتريات') }}</span>
                {{-- {{ __('اضافة فاتورة مشتريات') }} --}}
                @else
                <span class="text-muted mt-1 tx-20 mr-2 mb-0">/{{ __('فاتورة مبيعات') }}</span>
                @endif
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @include('layouts.AMA.includes.sessions')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                @if ($type == 'buy')
                <a class="btn btn-outline-primary btn-sm m-1" href="{{ route('invoices.sale') }}">{{ ('فاتورة مبيعات جديدة') }}</a>
                @else
                <a class="btn btn-outline-primary btn-sm m-1" href="{{ route('invoices.buy') }}">{{ ('فاتورة مشتريات جديدة') }}</a>
                @endif
                <div class="card-body">
                    <form action="{{ route('invoices.store') }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="invoice_type" value="2">
                                <label for="inputName" class="control-label">{{ __('اسم العميل') }}</label>
                                <select id="customer_id" name="customer_id" class="form-control SlectBox" >
                                    <!--placeholder-->
                                    <option value="" selected disabled>{{ __('حدد العميل') }}</option>
                                    @if ($type == 'sale')
                                        @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    @else
                                        @foreach ($traders as $trader)
                                        <option value="{{ $trader->id }}">{{ $trader->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('رقم الفاتورة') }}</label>
                                <input type="text" class="form-control" id="inputName" name="invoice_number"
                                    title="يرجي ادخال رقم الفاتورة" required>
                            </div>

                            <div class="col">
                                <label>{{ __('تاريخ الفاتورة') }}</label>
                                <input class="form-control fc-datepicker" name="invoice_date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ date('Y-m-d') }}" required>
                            </div>

                            <div class="col">
                                <label>{{ __('تاريخ الاستحقاق') }}</label>
                                <input class="form-control fc-datepicker" name="due_date" placeholder="YYYY-MM-DD"
                                    type="text" required>
                            </div>

                        </div>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('القسم') }}</label>
                                <select id="section_id" name="section_id" class="form-control SlectBox" >
                                    <!--placeholder-->
                                    <option value="" selected disabled>{{ __('حدد القسم') }}</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('المنتج') }}</label>
                                <select id="product_id" name="product_id" class="form-control">

                                </select>
                            </div>

                            <div class="col">
                                <label for="amount_collection" class="control-label">{{ __('مبلغ التحصيل') }}</label>
                                <input type="text" class="form-control" name="amount_collection" id="amount_collection"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>


                        {{-- 3 --}}

                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('مبلغ العمولة') }}</label>
                                <input type="text" class="form-control form-control-lg" id="amount_commission"
                                    name="amount_commission" title="يرجي ادخال مبلغ العمولة "
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('الخصم') }}</label>
                                <input type="text" class="form-control form-control-lg" id="discount" name="discount"
                                    title="يرجي ادخال مبلغ الخصم "
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value=0 required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('نسبة ضريبة القيمة المضافة') }}</label>
                                <select name="rate_vat" id="rate_vat" class="form-control" onchange="myFunction()">
                                    <!--placeholder-->
                                    <option value="" selected disabled>{{ __('حدد نسبة الضريبة') }}</option>
                                    <option value="5%">5%</option>
                                    <option value="10%">10%</option>
                                </select>
                            </div>

                        </div>

                        {{-- 4 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('قيمة ضريبة القيمة المضافة') }}</label>
                                <input type="text" class="form-control" id="value_vat" name="value_vat" readonly>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('الاجمالي شامل الضريبة') }}</label>
                                <input type="text" class="form-control" id="total" name="total" readonly>
                            </div>
                        </div>

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">{{ __('ملاحظات') }}</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
                            </div>
                        </div><br>

                        <p class="text-danger">{{ __('* صيغة المرفق pdf, jpeg ,.jpg , png ') }}</p>
                        <h5 class="card-title">{{ __('المرفقات') }}</h5>

                        <div class="col-sm-12 col-md-12">
                            <input type="file" name="img" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                data-height="70" />
                        </div><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">{{ __('حفظ البيانات') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

    @include('invoices.includes.js.add')

    @include('invoices.scripts.create')

@endsection
