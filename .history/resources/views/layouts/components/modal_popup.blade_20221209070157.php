<!-- Modal -->
<div class="modal fade general_modal" id="custom_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 16px;border: none!important;">
            <style>
                @media print {

                    .close {
                        display: none;
                    }

                    #footer_modal {
                        display: none;
                    }

                    @page {
                        size: auto;
                        margin: 0;
                    }

                    body {
                        margin: 10px;
                        padding: 10px;
                    }

                    #myModalNorm {
                        margin: 100px !important;
                    }

                    .title_item {
                        color: #000 !important;
                    }

                    #myModalLabel {
                        color: #000 !important;
                    }

                }
            </style>
            <!-- Modal Header -->
            <div class="modal-header"
                style="background: linear-gradient(60deg, #aa0dff, #4765ff)!important;color: #fff;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                <button type="button" class="close dismiss_modal" data-dismiss="modal"
                    onclick="$('#custom_modal').modal('toggle');">
                    <span aria-hidden="true" style="color: #fff">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body" style="opacity: 1">
                <div class="col-md-12">
                    <div class="cardm">
                        <div class="card-content">
                            <h4 class="card-title">{{ $title }}</h4>
                            @if ($action=="Add")
                            {{ Form::open(['route' => Str::lower($module).'.store','method' => 'post', 'enctype' =>
                            'multipart/form-data']) }}
                            @else
                            {{ Form::model($model, ['route' => [Str::lower($module).'.update', $model->id], 'method' =>
                            'patch','enctype' => 'multipart/form-data']) }}
                            @endif
                            @include($input_fields,['btn_action_title' => $action])
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer" id="footer_modal">
                <button id="btn_close" type="button" class="btn btn-primary btn-round dismiss_modal"
                    onclick="$('#custom_modal').modal('toggle');" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    (function ($) {
        'use strict';

        if ($(".selectpicker").length != 0) {
            $(".selectpicker").selectpicker();
        }



        $(function () {
            $('.dropify').dropify();
        });
    })(jQuery);
</script>