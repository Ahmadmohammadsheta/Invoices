
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
                            <option>{{ $section->name }}</option>
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


