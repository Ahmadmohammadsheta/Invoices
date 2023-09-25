
<!-- Basic modal -->
<div class="modal" id="modaldemo8">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('اضافة قسم جديد') }}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h6>{{ __('اضافة') }}</h6>

                <div class="modal-body">
                    <form action="{{ route('sections.store') }}" method="post" id="addForm">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __('اسم القسم') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

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
                            <button type="submit" class="btn btn-success">{{ __('تاكيد') }}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('اغلاق') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Basic modal -->
