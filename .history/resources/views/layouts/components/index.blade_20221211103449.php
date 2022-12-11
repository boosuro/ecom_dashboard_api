@extends("layouts.main")

@section("main-content")
<div class="row">
    <div class="col-lg-12 card-margin">
        <br><br>
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple"
                style="width: 80px;height: 80px;border: none;    background: linear-gradient(60deg, #aa0dff, #4765ff);">
                <i class="material-icons" style="margin-left: 7px;margin-top: 2px;">{{ $icon }}</i>
            </div>
            <div class="card-header " style="border: none">
                <h5 class="card-title" style="color:#000">{{ fromCamelCase($module) }} List</h5>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        @if ($title != "")
                        <button type="button"
                            onclick="customCrud({url:'{{ route(strtolower($module).'.create') }}',holder:'{{ ucfirst($module) }}',action:'Add', this_ : this});"
                            class="btn btn-primary btn-round pull-left" style="float: left">{{ $title }}</button>
                        @endif
                    </div>
                </div>
                <br><br>
                <br><br><br>
                <div class="table-responsive">
                    @include('layouts.components.table')
                </div>
            </div>
        </div>
    </div>
</div>

@push('additional_scripts')
<script src="<?php echo base_url(); ?>highchart/highcharts.js"></script>
<script src="<?php echo base_url(); ?>highchart/exporting.js"></script>
<script src="<?php echo base_url(); ?>highchart/data.js"></script>
<script src="<?php echo base_url(); ?>highchart/drilldown.js"></script>
@endpush


@endsection