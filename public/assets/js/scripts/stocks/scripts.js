
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //--------------------------------------------------------------------
    //--------------------------------------------------------------------
    //--------------------------------------------------------------------
    // Adding a stocks

    $(document).on('show.bs.modal', '#modaldemo8_create', function(event) {

        $.ajax({
            url: "/products/all_products",
            type:"GET",
            dataType: "json",
            success: function(response) {
                var select = $('#product_id');
                $.each(response.data, function(index, product) {
                    select.append($('<option>').val(product.id).text(product.name));
                });
            },
            error: function(error) {

            }
        });

        $(document).on('change', '#product_id', function(e) {
            // e.preventDefault();

            var productId = $(this).val();
            console.log(productId);
            if (productId) {
                // fill price input after product has selected
                $.ajax({
                    url: "products/" + productId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#price').empty();
                        $('#price').val(data.data.price);
                        console.log(data.data.price);
                    },
                });

                // fill color input after product has selected
                $.ajax({
                    url: "{{ URL::to('colors') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        $('#color_id').empty();
                        // Get the select element.
                        var select = $('#color_id');
                        $.each(response.data, function(index, color) {
                            select.append($('<option>').val(color.id).text(color.name));
                        });
                    },
                });

                // fill size input after product has selected
                $.ajax({
                    url: "{{ URL::to('sizes') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(response) {// Get the select element.
                        var select = $('#size_id');
                        $.each(response.data, function(index, size) {
                            select.append($('<option>').val(size.id).text(size.name));
                        });
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });

        $(document).on('click', '.add_item_btn', function(e) {
            e.preventDefault();

            $("#show_item").append(`
                <div class="row append_item">

                    <div class="col-md-2 mb-3">
                        <select id="product_id" name="product_id[]" class="form-control text-center text-danger SlectBox" style="font-size: 1.2rem" aria-label="Default select example">
                            <option  style="font-size: 1.2rem">اختر الصنف</option>
                        </select>
                    </div>

                    <div class="col-md-1 mb-3">
                        <input type="text" name="quantity[]" id="" class="form-control" placeholder="Quantity" required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <input type="text" name="price[]" id="price" class="form-control" placeholder="Price" required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <input type="text" name="buying_price[]" id="" class="form-control" placeholder="Buying price" required>
                    </div>

                    <div class="col-md-2 mb-3" id="color">
                        <select id="color_id" name="color_id[]" class="form-control text-center text-danger SlectBox" style="font-size: 1.2rem" aria-label="Default select example">

                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <select id="size_id" name="size_id[]" class="form-control text-center text-danger SlectBox" style="font-size: 1.2rem" aria-label="Default select example">

                        </select>
                    </div>

                    <div class="col-md-10 mb-3">
                        <input type="text" name="description[]" id="" class="form-control" placeholder="Description" required>
                    </div>

                    <div class="col-md-1 mb-3 d-grid">
                        <button class="btn btn-danger remove_item_btn"> X </button>
                    </div>
                </div>
            `);
        });

        // remove before added rows
        $(document).on('click', '.remove_item_btn', function(e) {
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });
    });
    //____________________________________________________________________
    //____________________________________________________________________
    //____________________________________________________________________


    // Showing a stocks
    //--------------------------------------------------------------------
    //--------------------------------------------------------------------
    //--------------------------------------------------------------------

    $('#modaldemo8_show').on('show.bs.modal', function(event) {

        $(".show_edit_type").empty()
        $('#show_form_check_edit').empty()

        var button = $(event.relatedTarget)
        var stock = button.data('stock')
        var id = stock.id
        var product_id = stock.product_id
        var quantity = stock.quantity
        var price = stock.price
        var buying_price = stock.buying_price
        var color_id = stock.color_id
        var size_id = stock.size_id
        var description = stock.description
        var modal = $(this)
        modal.find('.modal-body #stock').val(stock);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #product_id').val(product_id);
        modal.find('.modal-body #quantity').val(quantity);
        modal.find('.modal-body #price').val(price);
        modal.find('.modal-body #buying_price').val(buying_price);
        modal.find('.modal-body #color_id').val(color_id);
        modal.find('.modal-body #size_id').val(size_id);
        modal.find('.modal-body #description').val(description);
    });

    // Ajax request to edit cutomer form show modal
    $("#show_form_edit").submit(function(e) {
        e.preventDefault();

        var id = $("#id").val();

        $("#show_btn_edit").val('Updating......');

        $.ajax({
            url: "/stocks/updating/"+ id,
            type:"PUT",
            data: $(this).serialize(),
            success: function(response) {
                $("#show_btn_edit").val('Update');
                $(".table_div").load(location.href+ ' .table_div');
                $("#main_tab").load(location.href+ ' #main_tab');
                $("#additional_tab").load(location.href+ ' #additional_tab');
                $("#show_alert").html(`
                    <div class="alert alert-success text-center" style="font-size: 18px;" role="alert">${ response.message }</div>
                `);
                $("#modaldemo8_show").modal('hide');
            },
            error: function(error) {
                var requestErrors = error.responseJSON.errors;
                var str = `<ul>`;
                    for(var err in requestErrors) {
                        $(".error-text").html(str);
                        str += '<li>' + requestErrors[err][0] + '</li>';
                    }
                    str += '</ul>';
                $(".errors_div").html(str);
            }
        });
    });
    //____________________________________________________________________
    //____________________________________________________________________
    //____________________________________________________________________


    // Editing a stocks
    //--------------------------------------------------------------------
    //--------------------------------------------------------------------
    //--------------------------------------------------------------------
    $('#modaldemo8_edit').on('show.bs.modal', function(event) {

        $(".edit_type").empty()
        $('#form_check_edit').empty()

        var button = $(event.relatedTarget)
        var stock = button.data('stock')
        var id = stock.id
        var product_id = stock.product_id
        var quantity = stock.quantity
        var price = stock.price
        var buying_price = stock.buying_price
        var color_id = stock.color_id
        var size_id = stock.size_id
        var description = stock.description
        var modal = $(this)
        modal.find('.modal-body #stock').val(stock);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #product_id').val(product_id);
        modal.find('.modal-body #quantity').val(quantity);
        modal.find('.modal-body #price').val(price);
        modal.find('.modal-body #buying_price').val(buying_price);
        // modal.find('.modal-body #color_id').val(color_id);
        // modal.find('.modal-body #size_id').val(size_id);
        modal.find('.modal-body #description').val(description);
        // fill color input after product has selected
        $.ajax({
            url: "{{ URL::to('colors') }}",
            type: "GET",
            dataType: "json",
            success: function(response) {
                $('#color_id').empty();
                // Get the select element.

                $.each(response.data, function(index, color) {
                    $("#color_id").append(`
                        <option value="1" ${(color_id == color.id ? "selected" : "")} style="font-size: 1..2rem"> ${color.name} </option>
                    `);
                    // select.append($('<option>').val(color.id).text(color.name));
                });
            },
            error: function() {

            alert('d');
            }
        });

        // Ajax request to insert cutomer form data
        $("#edit_form").submit(function(e) {
            e.preventDefault();

            $("#edit_btn").val('Updating......');
            // var id = $("#id").val();

            console.log(id);
            $.ajax({
                url: "/stocks/updating/"+ id,
                type:"PUT",
                data: $(this).serialize(),
                success: function(response) {
                    $("#edit_btn").val('Update');
                    $("#edit_form")[0].reset();
                    $(".table_div").load(location.href+ ' .table_div');
                    $("#show_alert").html(`
                        <div class="alert alert-success text-center" style="font-size: 18px;" role="alert">${ response.message }</div>
                    `);
                    $("#modaldemo8_edit").modal('hide');
                },
                error: function(error) {
                    var requestErrors = error.responseJSON.errors;
                    var str = `<ul>`;
                        for(var err in requestErrors) {
                            $(".error-text").html(str);
                            str += '<li>' + requestErrors[err][0] + '</li>';
                        }
                        str += '</ul>';
                    $(".errors_div").html(str);
                }
            });
        });
    });
    //____________________________________________________________________
    //____________________________________________________________________
    //____________________________________________________________________


    //--------------------------------------------------------------------
    //--------------------------------------------------------------------
    //--------------------------------------------------------------------
    // deleting a product
    $('#modaldemo8_delete').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);

        $("#delete_form").submit(function(e) {
            e.preventDefault();

            $("#delete_btn").val('Deleteing......');

            $.ajax({
                url: "/stocks/deleting/"+ id,
                type:"DELETE",
                success: function(response) {
                    $("#delete_btn").val('deleted');
                    $(".table_div").load(location.href+ ' .table_div');
                    $("#show_alert").html(`
                        <div class="alert alert-success text-center" style="font-size: 18px;" role="alert">${ response.message }</div>
                    `);
                    $("#modaldemo8_delete").modal('hide');
                },
                error: function(error) {
                    console.log(error);
                    var requestErrors = error.responseJSON.errors;
                    var str = `<ul>`;
                        for(var err in requestErrors) {
                            $(".error-text").html(str);
                            str += '<li>' + requestErrors[err][0] + '</li>';
                        }
                        str += '</ul>';
                    $(".errors_div").html(str);
                }
            });
        });
    });
//____________________________________________________________________
//____________________________________________________________________
//____________________________________________________________________
});

