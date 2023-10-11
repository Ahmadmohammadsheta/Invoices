
<div class="col-xl-12">
    <!-- div -->
    <div class="card mg-b-20" id="tabs-style2">
        <div class="card-body">
            <div class="text-wrap">
                <div class="example">
                    <div class="panel panel-primary tabs-style-2">
                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs main-nav-line">
                                    <li><a href="#tab4" class="nav-link active" data-toggle="tab">{{('معلومات الفاتورة')}}</a></li>
                                    <li><a href="#tab5" class="nav-link" data-toggle="tab">{{ ('حالات الدفع') }}</a></li>
                                    <li><a href="#tab6" class="nav-link" data-toggle="tab">{{ ('المرفقات') }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body main-content-body-right border">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab4">
                                    <div class="table-responsive mt-15">

                                        <table class="table table-striped" style="text-align:center">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{ ('رقم الفاتورة') }}</th>
                                                    <td>{{ $invoice->invoice_number }}</td>
                                                    <th scope="row">{{ ('تاريخ الاصدار') }}</th>
                                                    <td>{{ $invoice->invoice_date }}</td>
                                                    <th scope="row">{{ ('تاريخ الاستحقاق') }}</th>
                                                    <td>{{ $invoice->due_date }}</td>
                                                    <th scope="row">{{ ('القسم') }}</th>
                                                    <td>{{ $invoice->section->name }}</td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">{{ ('المنتج') }}</th>
                                                    <td>{{ $invoice->product->name }}</td>
                                                    <th scope="row">{{ ('مبلغ التحصيل') }}</th>
                                                    <td>{{ $invoice->amount_collection }}</td>
                                                    <th scope="row">{{ ('مبلغ العمولة') }}</th>
                                                    <td>{{ $invoice->amount_commission }}</td>
                                                    <th scope="row">{{ ('الخصم') }}</th>
                                                    <td>{{ $invoice->discount }}</td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">{{ ('نسبة الضريبة') }}</th>
                                                    <td>{{ $invoice->rate_vAT }}</td>
                                                    <th scope="row">{{ ('قيمة الضريبة') }}</th>
                                                    <td>{{ $invoice->value_vAT }}</td>
                                                    <th scope="row">{{ ('الاجمالي مع الضريبة') }}</th>
                                                    <td>{{ $invoice->total }}</td>
                                                    <th scope="row">{{ ('الحالة الحالية') }}</th>

                                                    @if ($invoice->value_status == 1)
                                                        <td><span
                                                                class="badge badge-pill badge-success">{{ $invoice->status }}</span>
                                                        </td>
                                                    @elseif($invoice->alue_status ==2)
                                                        <td><span
                                                                class="badge badge-pill badge-danger">{{ $invoice->status }}</span>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <span class="badge badge-pill badge-warning">{{ $invoice->status }}</span>
                                                        </td>
                                                    @endif
                                                </tr>

                                                <tr>
                                                    <th scope="row">{{ ('ملاحظات') }}</th>
                                                    <td>{{ $invoice->note }}</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                                <div class="tab-pane" id="tab5">
                                    <div class="table-responsive mt-15">
                                        <table class="table center-aligned-table mb-0 table-hover"
                                            style="text-align:center">
                                            <thead>
                                                <tr class="text-dark">
                                                    <th>#</th>
                                                    <th>رقم الفاتورة</th>
                                                    <th>نوع المنتج</th>
                                                    <th>القسم</th>
                                                    <th>حالة الدفع</th>
                                                    <th>تاريخ الدفع </th>
                                                    <th>ملاحظات</th>
                                                    <th>تاريخ الاضافة </th>
                                                    <th>المستخدم</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0; ?>
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $invoice->invoicesDetail->invoice_number }}</td>
                                                    <td>{{ $invoice->invoicesDetail->product }}</td>
                                                    <td>{{ $invoice->section->name }}</td>
                                                    @if ($invoice->invoicesDetail->value_status == 1)
                                                        <td><span
                                                                class="badge badge-pill badge-success">{{ $invoice->invoicesDetail->status }}</span>
                                                        </td>
                                                    @elseif($invoice->invoicesDetail->value_status ==2)
                                                        <td><span
                                                                class="badge badge-pill badge-danger">{{ $invoice->invoicesDetail->status }}</span>
                                                        </td>
                                                    @else
                                                        <td><span
                                                                class="badge badge-pill badge-warning">{{ $invoice->invoicesDetail->status }}</span>
                                                        </td>
                                                    @endif
                                                    <td>{{ $invoice->invoicesDetail->payment_date }}</td>
                                                    <td>{{ $invoice->invoicesDetail->note }}</td>
                                                    <td>{{ $invoice->invoicesDetail->created_at }}</td>
                                                    <td>{{ $invoice->invoicesDetail->user }}</td>
                                                </tr>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>


                                <div class="tab-pane" id="tab6">
                                    <!--المرفقات-->
                                    <div class="card card-statistics">
                                        {{-- @can('اضافة مرفق') --}}
                                        <div class="card-body">
                                            <p class="text-danger">{{ ('* صيغة المرفق pdf, jpeg ,.jpg , png') }} </p>
                                            <h5 class="card-title">{{ ('اضافة مرفقات') }}</h5>
                                            <form method="post" action="{{ url('/InvoiceAttachments') }}"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile"
                                                        name="file_name" required>
                                                    <input type="hidden" id="customFile" name="invoice_number"
                                                        value="{{ $invoice->invoice_number }}">
                                                    <input type="hidden" id="invoice_id" name="invoice_id"
                                                        value="{{ $invoice->id }}">
                                                    <label class="custom-file-label" for="customFile">حدد
                                                        {{ ('المرفق') }}</label>
                                                </div><br><br>
                                                <button type="submit" class="btn btn-primary btn-sm " name="uploadedFile">{{ ('تاكيد') }}</button>
                                            </form>
                                        </div>
                                        {{-- @endcan --}}
                                        <br>

                                        <div class="table-responsive mt-15">
                                            <table class="table center-aligned-table mb-0 table table-hover" style="text-align:center">
                                                <thead>
                                                    <tr class="text-dark">
                                                        <th scope="col">م</th>
                                                        <th scope="col">اسم الملف</th>
                                                        <th scope="col">قام بالاضافة</th>
                                                        <th scope="col">تاريخ الاضافة</th>
                                                        <th scope="col">العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0; ?>
                                                    {{-- @foreach ($invoice->invoicesAttachment as $attachment) --}}
                                                        <?php $i++; ?>
                                                        @if ($invoice->invoicesAttachment)
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $invoice->invoicesAttachment->file_name }}</td>
                                                            <td>{{ $invoice->invoicesAttachment->created_by }}</td>
                                                            <td>{{ $invoice->invoicesAttachment->created_at }}</td>
                                                            <td colspan="2" class="d-flex">

                                                                <a class="btn btn-outline-success btn-sm m-1"
                                                                    href="{{ route('invoices_attachments.show', ['invoices_attachment' => $invoice->invoicesAttachment->id]) }}"
                                                                    role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                    {{ ('عرض') }}
                                                                </a>

                                                                <a class="btn btn-outline-info btn-sm m-1"
                                                                    href="{{ route('invoices.download', ['invoicesAttachment' => $invoice->invoicesAttachment->id]) }}"
                                                                    role="button"><i
                                                                        class="fas fa-download"></i>&nbsp;
                                                                    {{ ('تحميل') }}
                                                                </a>

                                                                {{-- @can('حذف المرفق') --}}
                                                                <button class="btn btn-outline-danger btn-sm m-1"
                                                                    data-toggle="modal"
                                                                    data-file_name="{{ $invoice->invoicesAttachment->file_name }}"
                                                                    data-invoice_number="{{ $invoice->invoicesAttachment->invoice_number }}"
                                                                    data-id_file="{{ $invoice->invoicesAttachment->id }}"
                                                                    data-target="#delete_file">
                                                                    <i class="fas fa-trash-alt"></i>&nbsp;
                                                                    {{ ('حذف') }}
                                                                </button>
                                                                {{-- @endcan --}}

                                                            </td>
                                                        </tr>
                                                        @endif
                                                    {{-- @endforeach --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /div -->
</div>
