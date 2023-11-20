
<!-- add -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('اضافة منتج') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('products.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label text-warning">{{ __('اسم بالعربية') }}</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Product" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="en_name" class="form-label text-warning">{{ __('اسم بالانجليزية') }}</label>
                            <input type="text" name="en_name" id="" class="form-control" placeholder="en_name" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="code" class="form-label text-warning">{{ __('الكود') }}</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="code" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="barecode" class="form-label text-warning">{{ __('الكود الدولي') }}</label>
                            <input type="text" name="barecode" id="barecode" class="form-control" placeholder="Barecode" required>
                        </div>

                        <div class="col-md-12 mb-3" id="color">
                            <label for="price" class="form-label text-warning">{{ __('السعر') }}</label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="price" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="unit_id" class="form-label text-warning">{{ __('الوحدة') }}</label>
                            <select id="unit_id" name="unit_id" class="form-control text-center text-danger SlectBox" style="font-size: 1.2rem" aria-label="Default select example">
                                <option value="" selected> {{ __('--حدد الوحدة--') }}</option>
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="section_id" class="form-label text-warning">{{ __('القسم') }}</label>
                            <select id="section_id" name="section_id" class="form-control text-center text-danger SlectBox" style="font-size: 1.2rem" aria-label="Default select example">
                                <option value="" selected disabled> --حدد القسم--</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-10 mb-3">
                            <label for="total_units" class="form-label text-warning">{{ __('اجمالي الوحدات') }}</label>
                            <input type="text" name="total_units" id="" class="form-control" placeholder="total_units" required>
                        </div>

                        <div class="col-md-10 mb-3">
                            <label for="description" class="form-label text-warning">{{ __('ملاحظات') }}</label>
                            <input type="text" name="description" id="" class="form-control" placeholder="Description" required>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ __('تاكيد') }}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- edit -->
<div class="modal fade" id="edit_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('تعديل منتج') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('products/update') }}" method="post" autocomplete="off">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('اسم بالعربية') }}</label>
                        <input type="hidden" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{ old('id') }}" required autocomplete="id" autofocus>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('اسم بالانجليزية') }}</label>
                        <input type="text" class="form-control @error('en_name') is-invalid @enderror" id="en_name" name="en_name" value="{{ old('en_name') }}" required autocomplete="en_name" autofocus>

                        @error('en_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('الكود') }}</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('en_name') }}">

                        @error('code')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('الكود الدولي') }}</label>
                        <input type="text" class="form-control @error('barecode') is-invalid @enderror" id="barecode" name="barecode" value="{{ old('barecode') }}">

                        @error('barecode')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('السعر') }}</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{ __('الوحدة') }}</label>
                    <select name="unit_id" id="unit_name" class="custom-select my-1 mr-sm-2" required>
                        @foreach ($units as $unit)
                            <option>{{ $unit->name }}</option>
                            <option value="{{ $unit->id }}">{{ $unit->id }}</option>
                        @endforeach
                    </select>

                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('اجمالي الوحدات') }}</label>
                        <input type="text" class="form-control @error('total_units') is-invalid @enderror" id="total_units" name="total_units" required value="{{ old('total_units') }}">

                        @error('total_units')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{ __('القسم') }}</label>
                    <select name="section_id" id="section_id" class="custom-select my-1 mr-sm-2" required>
                        <option></option>
                        @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name . $section->id }}</option>
                        @endforeach
                    </select>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ __('ملاحظات') }}</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description"  name="description" rows="3" value="{{ old('description') }}" autocomplete="description" autofocus></textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('تاكيد') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('اغلاق') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





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
