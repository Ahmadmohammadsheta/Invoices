
<!----------------------------------- Create modal ----------------------------------->
<!----------------------------------- Create modal ----------------------------------->
<!----------------------------------- Create modal ----------------------------------->
<!-- Basic modal -->
<div class="modal" id="modaldemo8">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('اضافة قسم جديد') }}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h6>{{ __('اضافة') }}</h6>
                    <form action="#" id="add_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="show_item">
                            <div class="row">

                                <div class="col-md-2 mb-3">
                                    <input type="text" name="product_id[]" id="" class="form-control" placeholder="Product" required>
                                </div>

                                <div class="col-md-1 mb-3">
                                    <input type="text" name="quantity[]" id="" class="form-control" placeholder="Quantity" required>
                                </div>

                                <div class="col-md-1 mb-3">
                                    <input type="text" name="price[]" id="" class="form-control" placeholder="Price" required>
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
<!-- End Basic modal -->
<!--________________________________ End create modal ________________________________-->
<!--________________________________ End create modal ________________________________-->
<!--________________________________ End create modal ________________________________-->



<!----------------------------------- Show modal ----------------------------------->
<!----------------------------------- Show modal ----------------------------------->
<!----------------------------------- Show modal ----------------------------------->
<!-- Basic modal -->
<div class="modal" id="modaldemo8_show">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('عرض بيانات العميل') }}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h6>{{ __('عرض') }}</h6><div class="col-xl-12">
                    <div id="show_alert"></div>
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
                                                    <li><a href="#tab4" class="nav-link active" data-toggle="tab">{{ __('المعلومات الرئيسية')}}</a></li>
                                                    <li><a href="#tab5" class="nav-link" data-toggle="tab">{{ __('معلومات اضافية') }}</a></li>
                                                    <li><a href="#tab6" class="nav-link" data-toggle="tab">{{ __('تعديل') }}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel-body tabs-menu-body main-content-body-right border">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab4">
                                                    <div class="card card-statistics">
                                                        <div class="row" id="main_tab">

                                                            <div class="col-md-4 mb-3">
                                                                <label for="name" class="form-label text-warning">{{ __('Name') }}</label>
                                                                <input type="hidden" name="id" id="id" value="" class="form-control text-center text-primary">
                                                                <input type="text" name="name" id="name" value="" class="form-control text-center text-primary" style="font-size: 1.2rem" readonly>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="national_id" class="form-label text-warning">{{ __('National_Id') }}</label>
                                                                <input type="text" name="national_id" id="national_id" value="" class="form-control text-center text-primary" style="font-size: 1.2rem" readonly>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="age" class="form-label text-warning">{{ __('Age') }}</label>
                                                                <input name="age" id="age" type="date" class="form-control text-center text-primary fc-datepicker" style="font-size: 1.2rem" placeholder="YYYY-MM-DD"
                                                                    type="text" value="" readonly>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="phone1" class="form-label text-warning">{{ __('Phone1') }}</label>
                                                                <input type="text" name="phone1" id="phone1" value="" class="form-control text-center text-primary" style="font-size: 1.2rem" readonly>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="email" class="form-label text-warning">{{ __('Email') }}</label>
                                                                <input type="email" name="email" id="email" value="" class="form-control text-center text-primary" style="font-size: 1.2rem" readonly>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="type" class="form-label text-warning">{{ __('Type') }}</label>
                                                                <input type="text" name="type" id="type" value="" class="form-control text-center text-primary" style="font-size: 1.2rem" readonly>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="tab5">
                                                    <div class="card card-statistics">
                                                        <div class="row" id="additional_tab">

                                                            <div class="col-md-4 mb-3">
                                                                <label for="approved" class="form-label text-warning">{{ __('Approved') }}</label>
                                                                <input type="text" name="approved" id="approved" value="" class="form-control text-center text-info" style="font-size: 1.2rem" placeholder="approved" readonly>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="phone2" class="form-label text-warning">{{ __('Phone2') }}</label>
                                                                <input type="text" name="phone2" id="phone2" value="" class="form-control text-center text-info" style="font-size: 1.2rem" placeholder="phone 2" readonly>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="phone3" class="form-label text-warning">{{ __('Phone3') }}</label>
                                                                <input type="text" name="phone3" id="phone3" value="" class="form-control text-center text-info" style="font-size: 1.2rem" placeholder="phone 3" readonly>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="national_id_image" class="form-label text-warning">{{ __('National Id Image') }}</label>
                                                                <input type="text" name="national_id_image" id="national_id_image" value="" class="form-control text-center text-info" style="font-size: 1.2rem" placeholder="National id image" readonly>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="created_by" class="form-label text-warning">{{ __('Created By') }}</label>
                                                                <input type="text" name="created_by" id="created_by" value="" class="form-control text-center text-info" style="font-size: 1.2rem" placeholder="User create" readonly>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="updated_by" class="form-label text-warning">{{ __('Updated By') }}</label>
                                                                <input type="text" name="updated_by" id="updated_by" value="" class="form-control text-center text-info" style="font-size: 1.2rem" placeholder="User update" readonly>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="tab-pane" id="tab6">
                                                    <!--تعديل-->
                                                    <div class="card card-statistics">
                                                        @can('role-edit')
                                                        <div class="card-body">
                                                            <h6>{{ __('تعديل') }}</h6>
                                                            <div class="errors_div text-danger"></div>
                                                            <form action="#" id="show_form_edit" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div id="show_item">
                                                                    <div class="row" id="">

                                                                        <div class="col-md-4 mb-3">
                                                                            <label for="name" class="form-label text-warning">{{ __('Name') }}</label>
                                                                            <input type="hidden" name="id" id="id" value="" class="form-control text-center text-danger">
                                                                            <input type="text" name="name" id="name" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="Product" required>
                                                                        </div>

                                                                        <div class="col-md-4 mb-3">
                                                                            <label for="national_id" class="form-label text-warning">{{ __('National_Id') }}</label>
                                                                            <input type="text" name="national_id" id="national_id" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="National id" required>
                                                                        </div>

                                                                        <div class="col-md-4 mb-3">
                                                                            <label for="age" class="form-label text-warning">{{ __('Age') }}</label>
                                                                            <input name="age" id="age" type="date" class="form-control text-center text-danger fc-datepicker" style="font-size: 1.2rem" placeholder="YYYY-MM-DD"
                                                                                type="text" value="" required>
                                                                        </div>

                                                                        <div class="col-md-4 mb-3 p-3" id="show_form_check_edit">
                                                                        </div>

                                                                        <div class="col-md-4 mb-3">
                                                                            <label for="email" class="form-label text-warning">{{ __('Email') }}</label>
                                                                            <input type="email" name="email" id="email" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="Email">
                                                                        </div>

                                                                        <div class="col-md-4 mb-2">
                                                                            <label for="type" class="form-label text-warning">{{ __('Type') }}</label>
                                                                            <select id="type" name="type" class="form-control text-center text-danger SlectBox show_edit_type" style="font-size: 1.2rem" aria-label="Default select example">
                                                                                <option  style="font-size: 1.2rem">{{ __('النوع') }}</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4 mb-3">
                                                                            <label for="phone1" class="form-label text-warning">{{ __('Phone1') }}</label>
                                                                            <input type="text" name="phone1" id="phone1" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="Phone1" required>
                                                                        </div>

                                                                        <div class="col-md-4 mb-3">
                                                                            <label for="phone2" class="form-label text-warning">{{ __('Phone2') }}</label>
                                                                            <input type="text" name="phone2" id="phone2" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="phone 2">
                                                                        </div>

                                                                        <div class="col-md-4 mb-3">
                                                                            <label for="phone3" class="form-label text-warning">{{ __('Phone3') }}</label>
                                                                            <input type="text" name="phone3" id="phone3" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="phone 3">
                                                                        </div>

                                                                        <div class="col-md-4 mb-3">
                                                                            <label for="national_id_image" class="form-label text-warning">{{ __('National Id Image') }}</label>

                                                                            <p class="text-danger">{{ __('* صيغة المرفق pdf, jpeg ,.jpg , png ') }}</p>
                                                                            <h5 class="card-title">{{ __('المرفقات') }}</h5>

                                                                            <div class="col-md-4 mb-3">
                                                                                <input type="file" name="national_id_image" id="national_id_image" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                                                                    data-height="70" />
                                                                            </div><br>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="submit_btn">
                                                                    <input type="submit" value="Update" class="btn btn-info w-100" id="edit_btn">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        @endcan
                                                        <br>

                                                        <div class="table-responsive mt-15">
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

            </div>
        </div>
    </div>
</div>
<!-- End Basic modal -->
<!--________________________________ End Show modal ________________________________-->
<!--________________________________ End Show modal ________________________________-->
<!--________________________________ End Show modal ________________________________-->




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
                                <label for="name" class="form-label text-warning">{{ __('Name') }}</label>
                                <input type="hidden" name="id" id="id" value="" class="form-control text-center text-danger">
                                <input type="text" name="name" id="name" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="Product" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="national_id" class="form-label text-warning">{{ __('National_Id') }}</label>
                                <input type="text" name="national_id" id="national_id" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="National id" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="age" class="form-label text-warning">{{ __('Age') }}</label>
                                <input name="age" id="age" type="date" class="form-control text-center text-danger fc-datepicker" style="font-size: 1.2rem" placeholder="YYYY-MM-DD"
                                    type="text" value="" required>
                            </div>

                            <div class="col-md-4 mb-3 p-3" id="show_form_check_edit">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="email" class="form-label text-warning">{{ __('Email') }}</label>
                                <input type="email" name="email" id="email" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="Email">
                            </div>

                            <div class="col-md-4 mb-2">
                                <label for="type" class="form-label text-warning">{{ __('Type') }}</label>
                                <select id="type" name="type" class="form-control text-center text-danger SlectBox edit_type" style="font-size: 1.2rem" aria-label="Default select example">
                                    <option  style="font-size: 1.2rem">{{ __('النوع') }}</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="phone1" class="form-label text-warning">{{ __('Phone1') }}</label>
                                <input type="text" name="phone1" id="phone1" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="Phone1" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="phone2" class="form-label text-warning">{{ __('Phone2') }}</label>
                                <input type="text" name="phone2" id="phone2" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="phone 2">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="phone3" class="form-label text-warning">{{ __('Phone3') }}</label>
                                <input type="text" name="phone3" id="phone3" value="" class="form-control text-center text-danger" style="font-size: 1.2rem" placeholder="phone 3">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="national_id_image" class="form-label text-warning">{{ __('National Id Image') }}</label>

                                <p class="text-danger">{{ __('* صيغة المرفق pdf, jpeg ,.jpg , png ') }}</p>
                                <h5 class="card-title">{{ __('المرفقات') }}</h5>

                                <div class="col-md-4 mb-3">
                                    <input type="file" name="national_id_image" id="national_id_image" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                        data-height="70" />
                                </div><br>

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