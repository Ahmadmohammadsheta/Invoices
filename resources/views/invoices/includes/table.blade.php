
<div class="col-xl-12">
    <div class="card mg-b-20">
        {{-- <div class="card-header pb-0 d-flex"> --}}
            <div class="d-flex">
                <a class="btn btn-outline-primary btn-sm m-1" href="{{ route('invoices.create') }}">{{ ('فاتورة جديدة') }}</a>
                <a class="btn btn-outline-success btn-sm m-1" href="{{ url('invoices/export') }}">{{ ('تصدير الفاتورة') }}</a>
            {{-- </div> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table key-buttons text-md-nowrap">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">{{ __('id') }}</th>
                            <th class="border-bottom-0">{{ __('رقم الفاتورة') }}</th>
                            <th class="border-bottom-0">{{ __('تاريخ الفاتورة') }}</th>
                            <th class="border-bottom-0">{{ __('تاريخ الاستحقاق') }}</th>
                            <th class="border-bottom-0">{{ __('المنتج') }}</th>
                            <th class="border-bottom-0">{{ __('القسم') }}</th>
                            <th class="border-bottom-0">{{ __('الخصم') }}</th>
                            <th class="border-bottom-0">{{ __('الضريبة') }}</th>
                            <th class="border-bottom-0">{{ __('قيمة الضريبة') }}</th>
                            <th class="border-bottom-0">{{ __('الاجمالي') }}</th>
                            <th class="border-bottom-0">{{ __('الحالة') }}</th>
                            <th class="border-bottom-0">{{ __('ملاحظات') }}</th>
                            <th class="border-bottom-0">{{ __('العمليات') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->invoice_number }}</td>
                            <td>{{ $item->invoice_date }}</td>
                            <td>{{ $item->due_date }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->section->name  }}</td>
                            <td>{{ $item->discount }}</td>
                            <td>{{ $item->value_vat }}</td>
                            <td>{{ $item->rate_vat }}</td>
                            <td>{{ $item->total }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->note }}</td>
                            <td>
                                @include('invoices.includes.operationsTableButtons')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('invoices.includes.modals.delete')
        @include('invoices.includes.modals.archives')
    </div>
</div>
