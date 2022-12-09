@push('additional_css')
    @include('layouts.components.datatables_css')
@endpush

{{ $dataTable->table(['width' => '100%','class'=>'table table-striped table-bordered','style'=>'margin-top:30px!important']) }}

@push('additional_scripts')
    @include('layouts.components.datatables_js')
    {!! $dataTable->scripts() !!}
@endpush