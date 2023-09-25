$('#edit_product').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var en_name = button.data('en_name')
    var code = button.data('code')
    var barecode = button.data('barecode')
    var price = button.data('price')
    var unit_name = button.data('unit_name')
    var total_units = button.data('total_units')
    var section_name = button.data('section_name')
    var description = button.data('description')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #en_name').val(en_name);
    modal.find('.modal-body #code').val(code);
    modal.find('.modal-body #barecode').val(barecode);
    modal.find('.modal-body #price').val(price);
    modal.find('.modal-body #unit_name').val(unit_name);
    modal.find('.modal-body #total_units').val(total_units);
    modal.find('.modal-body #section_name').val(section_name);
    modal.find('.modal-body #description').val(description);
})
