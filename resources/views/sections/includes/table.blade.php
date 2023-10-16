

<div class="card-header pb-0">
    <div class="d-flex justify-content-between">
        <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">
            @can('role-create')
            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-newspaper" data-toggle="modal" href="#modaldemo8">{{ __('اضافة قسم') }}</a>
            @endcan
        </div>
    </div>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table id="example1" class="table key-buttons text-md-nowrap">
            <thead>
                <tr>
                    <th class="border-bottom-0 text-center text-danger">{{ __('id') }}</th>
                    <th class="border-bottom-0 text-center text-danger">{{ __('اسم القسم') }}</th>
                    <th class="border-bottom-0 text-center text-danger">{{ __('الوصف') }}</th>
                    <th class="border-bottom-0 text-center text-danger">{{ __('العمليات') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td class="border-bottom-0 text-center">{{ $item->id }}</td>
                    <td class="border-bottom-0 text-center">{{ $item->name }}</td>
                    <td class="border-bottom-0 text-center">{{ $item->description }}</td>
                    <td>
                        @can('role-edit')
                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                data-description="{{ $item->description }}" data-toggle="modal"
                                href="#exampleModal2" title="تعديل"><i class="las la-pen"></i></a>
                        @endcan

                        @can('role-delete')
                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                    class="las la-trash"></i></a>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
