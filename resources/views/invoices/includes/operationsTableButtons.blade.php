
<div class="dropdown">
    <button aria-expanded="false" aria-haspopup="true"
        class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
        type="button">{{ ('العمليات') }}<i class="fas fa-caret-down ml-1"></i>
    </button>
    <div class="dropdown-menu tx-13">

        <a class="dropdown-item" href="{{ route('invoices.show', ['invoice' => $item->id]) }}"><i class="las la-pen"></i>{{ ('عرض الفاتورة') }}</a>

        <a class="dropdown-item" href="{{ route('invoices.edit', ['invoice' => $item->id]) }}"><i class="las la-pen"></i>{{ ('تعديل الفاتورة') }}</a>

        <a class="dropdown-item" href="#" data-invoice_id="{{ $item->id }}" data-toggle="modal" data-target="#delete_invoice"><i class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;{{ ('حذف الفاتورة') }}</a>

        <a class="dropdown-item" {{-- href="{{ URL::route('Status_show', [$item->id]) }}"> --}}<i class=" text-success fas fa-money-bill"></i>&nbsp;&nbsp;{{ ('تغير حالةالدفع') }}</a>

        <a class="dropdown-item" href="#" data-invoice_id="{{ $item->id }}" data-toggle="modal" data-target="#Transfer_invoice"><i class="text-warning fas fa-exchange-alt"></i>&nbsp;&nbsp;{{ ('نقل الي الارشيف') }}</a>

        <a class="dropdown-item" href="Print_invoice/{{ $item->id }}"><i class="text-success fas fa-print"></i>&nbsp;&nbsp;{{ ('طباعة الفاتورة') }}</a>
    </div>
</div>
