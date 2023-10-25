
<!----------------------------------- Create modal ----------------------------------->
<!----------------------------------- Create modal ----------------------------------->
<!----------------------------------- Create modal ----------------------------------->
<!-- Basic modal -->
<div class="modal" id="modaldemo8_create">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('اضافة عميل جديد') }}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h6>{{ __('اضافة') }}</h6>
                <form action="#" id="add_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="show_item">
                            <div class="errors_div text-danger"></div>
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <input type="text" name="name" id="name" class="form-control text-center" style="font-size: 1.2rem" placeholder="Name" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <input type="text" name="national_id" id="national_id" class="form-control text-center" style="font-size: 1.2rem" placeholder="National Id" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    {{-- <input type="text" name="age" id="age" class="form-control text-center" placeholder="Age" required> --}}
                                    <input name="age" id="age" type="date" class="form-control text-center fc-datepicker" style="font-size: 1.2rem" name="invoice_date" placeholder="YYYY-MM-DD"
                                        type="text" value="{{ date('Y-m-d') }}" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <input type="text" name="phone1" id="phone1" class="form-control text-center" style="font-size: 1.2rem" placeholder="Phone1" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <input type="email" name="email" id="email" class="form-control text-center" style="font-size: 1.2rem" placeholder="Email">
                                </div>

                                <div class="col-md-4 mb-2">
                                    <select name="type" class="form-control text-center SlectBox" style="font-size: 1.2rem" aria-label="Default select example">
                                        <option selected style="font-size: 1.2rem" >{{ __('النوع') }}</option>
                                        <option value="1" style="font-size: 1.2rem" >{{ __('مورد') }}</option>
                                        <option value="2" style="font-size: 1.2rem" >{{ __('عميل') }}</option>
                                        <option value="3" style="font-size: 1.2rem" >{{ __('مزدوج') }}</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="submit_btn">
                            <input type="submit" value="Add" class="btn btn-primary w-100" id="add_btn">
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<!-- End Basic modal -->
<!--________________________________ End create modal ________________________________-->
<!--________________________________ End create modal ________________________________-->
<!--________________________________ End create modal ________________________________-->




<!----------------------------------- Edit modal ----------------------------------->
<!----------------------------------- Edit modal ----------------------------------->
<!----------------------------------- Edit modal ----------------------------------->
<!-- Basic modal -->
<div class="modal" id="modaldemo8_edit">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('تعديل بيانات العميل') }}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h6>{{ __('تعديل') }}</h6>
                <div class="errors_div text-danger"></div>
                    <form action="#" id="edit_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div id="show_item">
                            <div class="row" id="">

                                <div class="col-md-4 mb-3">
                                    <input type="hidden" name="id" id="id" value="" class="form-control text-center text-danger">
                                    <input type="text" name="name" id="name" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="Product" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <input type="text" name="national_id" id="national_id" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="National id" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <input name="age" id="age" type="date" class="form-control text-center text-danger fc-datepicker" style="font-size: 1.2rem" name="invoice_date" placeholder="YYYY-MM-DD"
                                        type="text" value="" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <input type="text" name="phone1" id="phone1" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="Phone1" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <input type="email" name="email" id="email" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="Email">
                                </div>

                                <div class="col-md-4 mb-2">
                                    <select id="type" name="type" class="form-control text-center text-danger SlectBox" style="font-size: 1.2rem" aria-label="Default select example">
                                        <option  style="font-size: 1.2rem">{{ __('النوع') }}</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="submit_btn">
                            <input type="submit" value="Update" class="btn btn-info w-100" id="edit_btn">
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<!-- End Basic modal -->
<!--________________________________ End edit modal ________________________________-->
<!--________________________________ End edit modal ________________________________-->
<!--________________________________ End edit modal ________________________________-->




<!----------------------------------- Delete modal ----------------------------------->
<!----------------------------------- Delete modal ----------------------------------->
<!----------------------------------- Delete modal ----------------------------------->
<!-- delete -->
<div class="modal" id="modaldemo8_delete">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('حذف العميل') }}</h6><button aria-label="Close" class="close" data-dismiss="modal"
                    type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="#" id="delete_form" method="POST">
                    @csrf
                    @method('DELETE')
                    <p>{{ __('هل انت متاكد من عملية الحذف ؟') }}</p><br>
                    <input type="hidden" name="id" id="id" value="" class="form-control">
                    <input type="text" name="name" id="name" value="" class="form-control" >
                    <div class="text-center">
                        <input type="button" value="{{ __('الغاء') }}" class="btn btn-secondary m-1" data-dismiss="modal">
                        <input type="submit" value="{{ __('تأكيد') }}" class="btn btn-info m-1" id="delete_btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--________________________________ End delete modal ________________________________-->
<!--________________________________ End delete modal ________________________________-->
<!--________________________________ End delete modal ________________________________-->
