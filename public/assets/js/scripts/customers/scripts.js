
// Adding a customer
//--------------------------------------------------------------------
//--------------------------------------------------------------------
//--------------------------------------------------------------------
$(document).ready(function() {

    // Ajax request to insert cutomer form data
    $("#add_form").submit(function(e) {
        e.preventDefault();

        $("#add_btn").val('Adding......');

        $.ajax({
            url: "/customers",
            type:"POST",
            data: $(this).serialize(),
            success: function(response) {
                $("#add_btn").val('Add');
                $("#add_form")[0].reset();
                $(".table_div").load(location.href+ ' .table_div');
                $("#show_alert").html(`
                    <div class="alert alert-success role="alert">${ response }</div>
                `);
                $("#show_alert").html(`
                    <div class="alert alert-success text-center" style="font-size: 18px;" role="alert">${ response.message }</div>
                `);
                $("#modaldemo8_create").modal('hide');
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


// Editing a customer
//--------------------------------------------------------------------
//--------------------------------------------------------------------
//--------------------------------------------------------------------
$('#modaldemo8_edit').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var national_id = button.data('national_id')
    var email = button.data('email')
    var phone1 = button.data('phone1')
    var age = button.data('age')
    var type = button.data('type')
    var customer = button.data('customer')
    var modal = $(this)
    modal.find('.modal-body #customer').val(customer);
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #national_id').val(national_id);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #phone1').val(phone1);
    modal.find('.modal-body #age').val(age);
    modal.find('.modal-body #type').val(type);
    console.log(type, email);
    $("#type").append(`
        <option value="1" ${(type == 1 ? "selected" : "")} style="font-size: 13rem"> مورد </option>
        <option value="2" ${(type == 2 ? "selected" : "")} style="font-size: 13rem">عميل </option>
        <option value="3" ${(type == 3 ? "selected" : "")} style="font-size: 13rem"> مزدوج </option>
    `);

});

// Ajax request to insert cutomer form data
$("#edit_form").submit(function(e) {
    e.preventDefault();

    $("#edit_btn").val('Updating......');
    var id = $("#id").val();

    var id = $("#id").val();
    console.log(id);
    $.ajax({
        url: "/customers/updating/"+ id,
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
            url: "/customers/deleting/"+ id,
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
