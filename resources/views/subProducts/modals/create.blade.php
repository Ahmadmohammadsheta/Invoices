
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
                                    <button class="btn btn-success add_item_btn">{{ __('Add') }}</button>
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
