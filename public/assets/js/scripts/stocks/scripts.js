
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
    $(".add_item_btn").click(function (e) {
        e.preventDefault();

        $("#show_item").append(`
            <div class="row append_item">

                <div class="col-md-2 mb-3">
                    <select id="product_id" name="product_id[]" class="form-control text-center text-danger SlectBox" style="font-size: 1.2rem" aria-label="Default select example">
                        @foreach ($products as $product)
                        <option  style="font-size: 1.2rem">{{ $product->name }}</option>
                        @endforeach
                    </select>
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
                    <button class="btn btn-danger remove_item_btn">X</button>
                </div>
            </div>
        `);
    });

    $(document).on('click', '.remove_item_btn', function(e) {
        e.preventDefault();
        let row_item = $(this).parent().parent();
        $(row_item).remove();
    });


    // product details when changed
    // Adding a stocks
    $("")

    // Ajax request to insert multiple form data
    $("#add_form").submit(function(e) {
        e.preventDefault();
        $("#add_btn").val('Adding......');
        $.ajax({
            url: "/stocks",
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
        var stocks = button.data('stocks')
        var id = stocks.id
        var name = stocks.name
        var national_id = stocks.national_id
        var phone1 = stocks.phone1
        var email = stocks.email
        var age = stocks.age
        var type = stocks.type
        var national_id_image = stocks.national_id_image
        var approved = stocks.approved
        var created_by = stocks.created_by
        var updated_by = stocks.updated_by
        var phone2 = stocks.phone2
        var phone3 = stocks.phone3
        var modal = $(this)
        modal.find('.modal-body #stocks').val(stocks);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #national_id').val(national_id);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #phone1').val(phone1);
        modal.find('.modal-body #age').val(age);
        modal.find('.modal-body #type').val((type == 1) ? 'تاجر' : ((type == 2) ? 'عميل' : ((type == 3) ? 'مزدوج' : 'غير محدد')));
        modal.find('.modal-body #national_id_image').val(national_id_image);
        modal.find('.modal-body #approved').val(approved == 0 ? 'فعال' : 'غير فعال');
        modal.find('.modal-body #phone2').val(phone2);
        modal.find('.modal-body #phone3').val(phone3);
        modal.find('.modal-body #updated_by').val(updated_by);
        modal.find('.modal-body #created_by').val(created_by);
        $(".show_edit_type").append(`
            <option value="1" ${(type == 1 ? "selected" : "")} style="font-size: 1.3rem"> مورد </option>
            <option value="2" ${(type == 2 ? "selected" : "")} style="font-size: 1.3rem">عميل </option>
            <option value="3" ${(type == 3 ? "selected" : "")} style="font-size: 1.3rem"> مزدوج </option>
        `);

        $('#show_form_check_edit').append(`
            <div class="form-check">
                <input class="form-check-input" value="0" type="radio" name="approved" id="approved" ${(approved == 0 ? "checked" : "")} >
                <label class="form-check-label mr-4" for="approved" style="font-size= 1.3rem">فعال</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="1" type="radio" name="approved" id="approved"  ${(approved == 1 ? "checked" : "")} >
                <label class="form-check-label mr-4" for="approved" style="font-size= 1.3rem">غير فعال</label>
            </div>
        `)
    });

    // Ajax request to edit cutomer form show modal
    $("#show_form_edit").submit(function(e) {
        e.preventDefault();

        var id = $("#id").val();
        console.log(id);
        $("#show_btn_edit").val('Updating......');
        console.log(id);
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
        var stocks = button.data('stocks')
        var id = stocks.id
        var name = stocks.name
        var national_id = stocks.national_id
        var phone1 = stocks.phone1
        var email = stocks.email
        var age = stocks.age
        var type = stocks.type
        var national_id_image = stocks.national_id_image
        var approved = stocks.approved
        var created_by = stocks.created_by
        var updated_by = stocks.updated_by
        var phone2 = stocks.phone2
        var phone3 = stocks.phone3
        var modal = $(this)
        modal.find('.modal-body #stocks').val(stocks);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #national_id').val(national_id);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #phone1').val(phone1);
        modal.find('.modal-body #age').val(age);
        modal.find('.modal-body #type').val(type);
        modal.find('.modal-body #national_id_image').val(national_id_image);
        modal.find('.modal-body #approved').val(approved);
        modal.find('.modal-body #phone2').val(phone2);
        modal.find('.modal-body #phone3').val(phone3);
        modal.find('.modal-body #updated_by').val(updated_by);
        modal.find('.modal-body #created_by').val(created_by);
        console.log(type, email, stocks, national_id_image);
        $(".edit_type").append(`
            <option value="1" ${(type == 1 ? "selected" : "")} style="font-size: 1..2rem"> مورد </option>
            <option value="2" ${(type == 2 ? "selected" : "")} style="font-size: 1.2rem">عميل </option>
            <option value="3" ${(type == 3 ? "selected" : "")} style="font-size: 1.2rem"> مزدوج </option>
        `);

        $('#form_check_edit').append(`
            <div class="form-check">
                <input class="form-check-input" value="0" type="radio" name="approved" id="approved" ${(approved == 0 ? "checked" : "")} >
                <label class="form-check-label mr-4" for="approved" style="font-size= 1.3rem">فعال</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="1" type="radio" name="approved" id="approved"  ${(approved == 1 ? "checked" : "")} >
                <label class="form-check-label mr-4" for="approved" style="font-size= 1.3rem">غير فعال</label>
            </div>
        `)

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

