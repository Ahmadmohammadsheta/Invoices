
<form action="/Search_invoices" method="POST" role="search" autocomplete="off">
    {{ csrf_field() }}


    <div class="col-lg-3">
        <label class="rdiobox">
            <input checked name="rdio" type="radio" value="1" id="type_div"> <span>بحث بنوع
                الفاتورة</span></label>
    </div>


    <div class="col-lg-3 mg-t-20 mg-lg-t-0">
        <label class="rdiobox"><input name="rdio" value="2" type="radio"><span>بحث برقم الفاتورة
            </span></label>
    </div><br><br>

    <div class="row">

        <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="type">
            <p class="mg-b-10">تحديد نوع الفواتير</p><select class="form-control select2" name="type"
                required>
                <option value="{{ $type ?? 'حدد نوع الفواتير' }}" selected>
                    {{ $type ?? 'حدد نوع الفواتير' }}
                </option>

                <option value="مدفوعة">الفواتير المدفوعة</option>
                <option value="غير مدفوعة">الفواتير الغير مدفوعة</option>
                <option value="مدفوعة جزئيا">الفواتير المدفوعة جزئيا</option>

            </select>
        </div><!-- col-4 -->


        <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="invoice_number">
            <p class="mg-b-10">البحث برقم الفاتورة</p>
            <input type="text" class="form-control" id="invoice_number" name="invoice_number">

        </div><!-- col-4 -->

        <div class="col-lg-3" id="start_at">
            <label for="exampleFormControlSelect1">من تاريخ</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div><input class="form-control fc-datepicker" value="{{ $start_at ?? '' }}"
                    name="start_at" placeholder="YYYY-MM-DD" type="text">
            </div><!-- input-group -->
        </div>

        <div class="col-lg-3" id="end_at">
            <label for="exampleFormControlSelect1">الي تاريخ</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div><input class="form-control fc-datepicker" name="end_at"
                    value="{{ $end_at ?? '' }}" placeholder="YYYY-MM-DD" type="text">
            </div><!-- input-group -->
        </div>
    </div><br>

    <div class="row">
        <div class="col-sm-1 col-md-1">
            <button class="btn btn-primary btn-block">بحث</button>
        </div>
    </div>
</form>
