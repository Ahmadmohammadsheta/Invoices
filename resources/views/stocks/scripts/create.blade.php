
<script>
    $(".add_item_btn").click(function (e) {
        e.preventDefault();
        $("#show_item").append(`
            <div class="row append_item">

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
                    <button class="btn btn-danger remove_item_btn">{{ __('X') }}</button>
                </div>
            </div>
        `);
    });
    $(document).on('click', '.remove_item_btn', function(e) {
        e.preventDefault();
        let row_item = $(this).parent().parent();
        $(row_item).remove();
    });

    // Ajax request to insert multiple form data
    $("#add_form").submit(function(e) {
        e.preventDefault();
        $("#add_btn").val('Adding......');
        $.ajax({
            url: "{{ route('stocks.store') }}",
            type:"POST",
            // method: 'post',
            data: $(this).serialize(),
            success: function(response) {
                $("#add_btn").val('Add');
                $("#add_form")[0].reset();
                $(".append_item").remove();
                $(".table_div").load(location.href+ ' .table_div');
                $("#show_alert").html(`
                    <div class="alert alert-success role="alert">${ response }</div>
                `);
                $("#modaldemo8").modal('hide');
            }
        });
    });
</script>
