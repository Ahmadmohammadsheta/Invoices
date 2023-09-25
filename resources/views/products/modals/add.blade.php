
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
                        {{ csrf_field() }}
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('اسم بالعربية') }}</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('اسم بالانجليزية') }}</label>
                                <input type="text" class="form-control" id="en_name" name="en_name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('الكود') }}</label>
                                <input type="text" class="form-control" id="code" name="code">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('الكود الدولي') }}</label>
                                <input type="text" class="form-control" id="barecode" name="barecode">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('السعر') }}</label>
                                <input type="text" class="form-control" id="price" name="price">
                            </div>

                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{ __('الوحدة') }}</label>
                            <select name="unit_id" id="unit_id" class="form-control" required>
                                <option value="" selected disabled>{{ __('--حدد الوحدة--') }}</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>

                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('اجمالي الوحدات') }}</label>
                                <input type="text" class="form-control" id="total_units" name="total_units" required>
                            </div>

                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                            <select name="section_id" id="section_id" class="form-control" required>
                                <option value="" selected disabled> --حدد القسم--</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">ملاحظات</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
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