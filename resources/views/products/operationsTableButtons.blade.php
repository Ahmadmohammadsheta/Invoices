
@can('role-edit')

<!-- Edit Product button -->
<button class="btn btn-outline-success btn-sm"
    data-id="{{ $product->id }}"
    data-name="{{ $product->name }}"
    data-en_name="{{ $product->en_name }}"
    data-code="{{ $product->code }}"
    data-barecode="{{ $product->barecode }}"
    data-unit_name="{{ $product->unit->name }}"
    data-total_units="{{ $product->total_units }}"
    data-price="{{ $product->price }}"
    data-section_id="{{ $product->section->name }}"
    data-description="{{ $product->description }}"
    data-toggle="modal" data-target="#edit_product">

    {{ __('تعديل') }}

</button>
<!--/ Edit Product button -->
@endcan



@can('role-delete')

<!-- Delete Product button -->
<button class="btn btn-outline-danger btn-sm " data-id="{{ $product->id }}"
    data-name="{{ $product->name }}" data-toggle="modal"
    data-target="#delete_product">

    {{ __('حذف') }}

</button>
<!--/ Delete Product button -->
@endcan

