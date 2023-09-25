@extends('layouts.master')
@section('css')
    @include('invoices.includes.css.add')
@endsection
@section('title')
    {{ __('تعديل فاتورة رقم - (' . $invoice->invoice_number . ')' ) }}
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('الفواتير') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('اضافة فاتورة') }}</span>
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
                <div class="card-body">
                    <form action="{{ route('invoices.update', ['invoice' => $invoice->id]) }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        @method('PUT')
                        @csrf
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('رقم الفاتورة') }}</label>
                                <input type="text" class="form-control" id="inputName" name="invoice_number"
                                    title="يرجي ادخال رقم الفاتورة" required value="{{ $invoice->invoice_number }}">
                            </div>

                            <div class="col">
                                <label>{{ __('تاريخ الفاتورة') }}</label>
                                <input class="form-control fc-datepicker" name="invoice_date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ date('Y-m-d') }}" required value="{{ $invoice->invoice_date }}">
                            </div>

                            <div class="col">
                                <label>{{ __('تاريخ الاستحقاق') }}</label>
                                <input class="form-control fc-datepicker" name="due_date" placeholder="YYYY-MM-DD"
                                    type="text" required value="{{ $invoice->due_date }}">
                            </div>

                        </div>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('القسم') }}</label>
                                <select id="section_id" name="section_id" class="form-control SlectBox" >
                                    <!--placeholder-->
                                    {{-- <option value=" {{ $invoice->section->id }}">
                                        {{ $invoice->section->name }}
                                    </option> --}}
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}" {{ $section->id !== $invoice->section->id ?: 'selected' }}>{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('المنتج') }}</label>
                                <select id="product_id" name="product_id" class="form-control">
                                    <option value="{{ $invoice->product->id }}"> {{ $invoice->product->name }}</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('مبلغ التحصيل') }}</label>
                                <input type="text" class="form-control" id="inputName" name="amount_collection"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{ $invoice->amount_collection }}">
                            </div>
                        </div>


                        {{-- 3 --}}

                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('مبلغ العمولة') }}</label>
                                <input type="text" class="form-control form-control-lg" id="amount_commission"
                                    name="amount_commission" title="يرجي ادخال مبلغ العمولة "
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    required value="{{ $invoice->amount_commission }}">
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('الخصم') }}</label>
                                <input type="text" class="form-control form-control-lg" id="discount" name="discount"
                                    title="يرجي ادخال مبلغ الخصم "
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value=0 required value="{{ $invoice->discount }}">
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('نسبة ضريبة القيمة المضافة') }}</label>
                                <select name="rate_vat" id="rate_vat" class="form-control" onchange="myFunction()">
                                    <!--placeholder-->
                                    <option value="" selected disabled>{{ __('حدد نسبة الضريبة') }}</option>
                                    <option {{ $invoice->rate_vat !== '5%' ?: 'selected'}} value="5%">5%</option>
                                    <option {{ $invoice->rate_vat !== '10%' ?: 'selected'}} value="10%">10%</option>
                                </select>
                            </div>

                        </div>

                        {{-- 4 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('قيمة ضريبة القيمة المضافة') }}</label>
                                <input type="text" class="form-control" id="value_vat" name="value_vat" readonly value="{{ $invoice->value_vat }}">
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('الاجمالي شامل الضريبة') }}</label>
                                <input type="text" class="form-control" id="total" name="total" readonly value="{{ $invoice->total }}">
                            </div>
                        </div>

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">{{ __('ملاحظات') }}</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3"> {{ $invoice->note }} </textarea>
                            </div>
                        </div><br>

                        <p class="text-danger">{{ __('* صيغة المرفق pdf, jpeg ,.jpg , png ') }}</p>
                        <h5 class="card-title">{{ __('المرفقات') }}</h5>

                        <div class="col-sm-12 col-md-12">
                            <input type="file" name="img" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                data-height="70" value=""/>
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
    @include('invoices.scripts.scripts')

@endsection
