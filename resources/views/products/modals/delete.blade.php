    <!-- delete -->
    <div class="modal" id="delete_product">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('حذف القسم') }}</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('products/destroy') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <p>{{ __('هل انت متاكد من عملية الحذف ؟') }}</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="name" id="name" type="text" readonly>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('الغاء') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('تاكيد') }}</button>
                </div>
            </div>
        </div>
    </div>
