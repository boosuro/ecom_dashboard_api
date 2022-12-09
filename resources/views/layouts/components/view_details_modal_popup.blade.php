<!-- Modal -->
<div class="modal fade general_modal" id="custom_modal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 16px;border: none!important;">
            <style>
                 .border_item_trans{
                    font-size: 16px!important;
                }

                tr , th, td {
                    border-left: 0px solid;
                    border-right: 0px solid;
                }
                .border_it{
                    border: none!important;
                }

                .item_data{
                    font-weight: normal!important;
                }

                .details_table{
                    border-bottom: 1px solid  rgb(173, 171, 171);
                    text-align: left!important;
                    font-family: Roboto, 'Segoe UI', Tahoma, sans-serif;
                }
                .receipt_summary{
                    text-align: right;
                    padding: 5px;
                    border-top: 1px solid rgb(173, 171, 171);
                    color: #000 !important;
                    font-weight: 500;
                }
                .item_row_data2{
                    border-top: 1px solid rgb(173, 171, 171);
                    padding: 5px;
                }
                @media print {
                   
                    .close{
                        display: none;
                    }
                    #footer_modal{
                        display: none;
                    }
                    @page{size: auto;margin: 0;}
                    body{
                        margin: 10px;
                        padding: 10px;
                    }
                    #myModalNorm{
                        margin: 100px !important;
                    }
                    .title_item{
                        color: #000 !important;
                    }
                    #myModalLabel{
                        color: #000 !important;
                    }
                }
            </style>
            <!-- Modal Header -->
            <div class="modal-header" style="background: linear-gradient(60deg, #aa0dff, #4765ff)!important;color: #fff;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                <button type="button" class="close"
                        data-dismiss="modal">
                    <span aria-hidden="true" style="color: #fff">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body" style="opacity: 1">
                <div class="col-md-12">
                    <div class="cardm">
                        <div class="card-content">
                            <h4 class="card-title">{{ $title }} | {{  $user->name }}</h4>
                            <br><br>
                            <div class="row">
                                <span  class="btn btn-primary btn-round " id="print" style="cursor: pointer" onclick="javascript:printDiv('PrintHolder')">Print</span>
                            </div>
                            <div  id="PrintHolder">
                                <center><h5><strong style="text-transform: uppercase!important;text-decoration:underline;font-size:26px">{{ trans('lang.order_details') }}</strong></h5></center>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="summary_table" >
                                        <thead>
                                        <tr>
                                            <th class="border_item_trans border_it">{{ trans('lang.order_number') }}  </th>
                                            <th class="border_it item_data"><?php echo $order->order_number ?></th>
                                            <th class="border_item_trans border_it">{{ trans('lang.customer_name') }}  </th>
                                            <th class="border_it item_data"><?php echo $user->name ?></th>
                                            <th class="border_item_trans border_it">{{ trans('lang.phone') }}  </th>
                                            <th class="border_it item_data"><?php echo $user->phone ?></th>
                                        </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="border_item_trans border_it">{{ trans('lang.delivery_address') }}  </th>
                                                <th class="border_it item_data"><?php echo $delivery_address->address ?></th>
                                                <th class="border_item_trans border_it">{{ trans('lang.order_date') }}  </th>
                                                <th class="border_it item_data"><?php echo $order->created_at ?></th>
                                                <th class="border_item_trans border_it">{{ trans('lang.order_status') }}  </th>
                                                <th class="border_it item_data"><?php echo $order->orderStatus->order_status ?></th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="border_item_trans border_it">{{ trans('lang.active') }}  </th>
                                                <th class="border_it item_data"><?php echo changeStatusBackground($order, 'is_active') ?></th>
                                                <th class="border_item_trans border_it">{{ trans('lang.payment_method') }}  </th>
                                                <th class="border_it item_data"><?php echo $payment->payment_method ?></th>
                                                <th class="border_item_trans border_it">{{ trans('lang.payment_status') }}  </th>
                                                <th class="border_it item_data"><?php echo $payment->payment_status ?></th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="border_item_trans border_it">{{ trans('lang.last_updated_date') }}  </th>
                                                <th class="border_it item_data"><?php echo $order->updated_at ?></th>
                                                <th class="border_item_trans border_it">{{ trans('lang.restaurant_name') }}  </th>
                                                <th class="border_it item_data"><?php echo $restaurant->name ?></th>
                                                <th class="border_item_trans border_it">{{ trans('lang.restaurant_address') }}  </th>
                                                <th class="border_it item_data"><?php echo $restaurant->address ?></th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="border_item_trans border_it">{{ trans('lang.restaurant_phone') }}  </th>
                                                <th class="border_it item_data"><?php echo $restaurant->phone ?></th>
                                                <th class="border_item_trans border_it">{{ trans('lang.assigned_delivery_agent') }}  </th>
                                                <th class="border_it item_data"><?php if(isset($delivery_agent->users->name)){  echo $delivery_agent->users->name; }else{ echo trans('lang.pending'); } ?></th>
                                                <th class="border_item_trans border_it"> </th>
                                                <th class="border_it item_data"></th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <br><br>
                                    <table class="table table-striped  table-hover" style="width: 100%!important" cellspacing="0" >
                                        <thead class="details_table" >
                                            <tr id="details_heading" >
                                                <th class="border_item_trans details_table">{{ trans('lang.food') }}  </th>
                                                <th class="border_item_trans details_table">{{ trans('lang.food_addon_plural') }}  </th>
                                                <th class="border_item_trans details_table">{{ trans('lang.price') }}  </th>
                                                <th class="border_item_trans details_table">{{ trans('lang.quantity') }}  </th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            @forelse ( $foodOrders as $foodOrder )
                                                <tr>
                                                    <td class="details_table item_row_data" >{{ $foodOrder->food->name }}</td>
                                                    <td class="details_table item_row_data" >
                                                        {{ $foodOrder->foodAddons->implode('name',',') }}
                                                    </td>
                                                    <td class="details_table item_row_data" >
                                                        @php
                                                            $cart_row_item_amount = $foodOrder->price;
                                                            $cart_row_item_amount += $foodOrder->foodAddons->first()->pivot->where('food_order_id',$foodOrder->id)->sum('amount_addon');
                                                        @endphp
                                                      
                                                        {{ 'GHC '.$cart_row_item_amount }}
                                                    </td>
                                                    <td class="details_table item_row_data" >
                                                        {{ $foodOrder->quantity }}
                                                    </td>
                                                </tr>
                                            @empty
                                                
                                            @endforelse
                                            
                                        </tbody>
                                    </table>
                                    
                                </div>
                                <br><br>
                                <div class="row">
                                   <div class="col-md-12">
                                        <div class="table-responsive">
                                            <div class="col-6 offset-6">
                                                <table style="width: 40%;float: right;"  cellspacing="0"  class="receipt_summary_table" >
                                                    <tbody>
                                                        <tr>
                                                            <th class=" receipt_summary">{{ trans('lang.sub_total') }} </th>
                                                            <td class="item_row_data2">GHC {{ formatAmount($sub_total) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class=" receipt_summary">{{ trans('lang.delivery_fee') }} </th>
                                                            <td class="item_row_data2">GHC {{ formatAmount($order->delivery_fee) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class=" receipt_summary">{{ trans('lang.tax') }} ( {{ $order->tax }}% ) </th>
                                                            <td class="item_row_data2">GHC {{ formatAmount($tax_amount) }} </td>
                                                        </tr>
                                                        <tr>
                                                            <th class=" receipt_summary">{{ trans('lang.discount_amount') }}  </th>
                                                            <td class="item_row_data2">GHC {{ formatAmount($order->discount_amount) }} </td>
                                                        </tr>
                                                        <tr>
                                                            <th class=" receipt_summary">{{ trans('lang.overall_total') }} </th>
                                                            <td class="item_row_data2" >GHC {{ formatAmount($overall_total) }} </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer" id="footer_modal">
                <button id="btn_close" type="button" class="btn btn-primary btn-round "
                        data-dismiss="modal">
                   {{ trans('lang.close') }}
                </button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;

        // //Reset the page's HTML with div's HTML only
        var headContent =
            "<title></title>" +
                "<style>" +
                ".receipt_summary_table > tbody > tr > th,.receipt_summary_table > tbody  > tr > td{"+
                       "border-top: 2px solid rgb(228 228 228 / 50%);"+
                       " padding: 5px;"+
                         "font-size: 12px;"+
                    "}"+
                    ".receipt_summary{"+
                        "text-align: right;"+
                       " padding-right : 15px;"+
                       "font-weight: 500;"+
                       "font-family: Roboto, 'Segoe UI', Tahoma, sans-serif;"+
                    "}"+
                    ".item_row_data2 {"+
                        "font-weight: normal!important;"+
                        "font-size: 12px;"+
                        "font-family: Roboto, 'Segoe UI', Tahoma, sans-serif;"+
                    "}"+
                    ".border_it{"+
                        "font-size: 12px!important;"+
                        "text-align: left!important;"+
                        "font-family: Roboto, 'Segoe UI', Tahoma, sans-serif;"+
                    "}"+
                    ".item_data{"+
                        "font-weight: normal!important;"+
                    "}"+
                    ".border_item_trans{"+
                        "font-weight: 600!important;"+
                    "}"+
                   "#summary_table {"+
                        "border:solid #fff !important;"+
                        "border-width:1px 0 0 0px !important;"+
                    "}"+
                    "#summary_table > th {"+
                        "border:solid #fff !important;"+
                        "border-width:0 0px 0px 0 !important;"+
                    "}"+
                    ".item_row_data {"+
                        "font-weight: normal!important;"+
                        "font-size: 12px;"+
                    "}"+
                   " .details_table{"+
                       " border-bottom: 2px solid rgb(228 228 228 / 50%);"+
                       " padding: 14px 0px 14px 0px;"+
                       " text-align: left!important;"+
                        "font-family: Roboto, 'Segoe UI', Tahoma, sans-serif;"+
                    "}"+
                    "#details_heading >th {"+
                        "border-bottom: 3px solid rgb(214 214 214 / 70%);"
                    "}"
                    
                "</style>";

        document.head.innerHTML = headContent;
        document.body.innerHTML = divElements;
        window.print();
        location.reload(true);
    }

</script>