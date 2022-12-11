@extends("layouts.main")

@section("main-content")

<div class="row">
    <div class="col-lg-3 card-margin" style="margin-bottom: 33px;">
        <div class="card"
            style="border:none;background: linear-gradient(60deg, #aa0dff, #4765ff)!important;box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);">
            <div class="card-header card-header-icon" data-background-color="purple"
                style="width: 80px;height: 80px;border: none;background-color:#8530ff;">
                <i class="material-icons" style="margin-left: 7px;margin-top: 2px;">person</i>
            </div>
            <div class="card-header no-border"
                style="border-bottom:none!important;background-color: rgb(0 0 0 / 0.0);display: block!important;">
                <h5 class="card-title pull-right" style="color: #fff;text-align: right">System Users</h5>
            </div>
            <div class="card-body">
                <div id="device-overview" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner" style="overflow: visible;">
                        <div class="carousel-item active">
                            <div class="widget-3" style="margin-top: -45px;">
                                <div class="widget-3-statistics-graph" style="height: 1px!important;">
                                    <div class="widget-3-figure">
                                    </div>
                                </div>
                                <div class="widget-3-statistics">
                                    <div class="widget-3-figure" style="text-align: right;">
                                        <span style="color: #fff">{{ $users }}</span>
                                    </div>
                                    <div class="widget-3-title" style="color: #fff">
                                        Number of System Users
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 card-margin" style="margin-bottom: 33px;">
        <div class="card"
            style="border:none;background: linear-gradient(60deg, #aa0dff, #4765ff)!important;box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);">
            <div class="card-header card-header-icon" data-background-color="purple"
                style="width: 80px;height: 80px;border: none;background-color:#8530ff;">
                <i class="material-icons" style="margin-left: 7px;margin-top: 2px;">list</i>
            </div>
            <div class="card-header no-border"
                style="border-bottom:none!important;background-color: rgb(0 0 0 / 0.0);display: block!important;">
                <h5 class="card-title pull-right" style="color: #fff;text-align: right">Products</h5>
            </div>
            <div class="card-body">
                <div id="device-overview" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner" style="overflow: visible;">
                        <div class="carousel-item active">
                            <div class="widget-3" style="margin-top: -45px;">
                                <div class="widget-3-statistics-graph" style="height: 1px!important;">
                                    <div class="widget-3-figure">
                                    </div>
                                </div>
                                <div class="widget-3-statistics">
                                    <div class="widget-3-figure" style="text-align: right;">
                                        <span style="color: #fff">{{ $products }}</span>
                                    </div>
                                    <div class="widget-3-title" style="color: #fff">
                                        Number of Products
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 card-margin" style="margin-bottom: 33px;">
        <div class="card"
            style="border:none;background: linear-gradient(60deg, #aa0dff, #4765ff)!important;box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);">
            <div class="card-header card-header-icon" data-background-color="purple"
                style="width: 80px;height: 80px;border: none;background-color:#8530ff;">
                <i class="material-icons" style="margin-left: 7px;margin-top: 2px;">gavel</i>
            </div>
            <div class="card-header no-border"
                style="border-bottom:none!important;background-color: rgb(0 0 0 / 0.0);display: block!important;">
                <h5 class="card-title pull-right" style="color: #fff;text-align: right">Product Variants</h5>
            </div>
            <div class="card-body">
                <div id="device-overview" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner" style="overflow: visible;">
                        <div class="carousel-item active">
                            <div class="widget-3" style="margin-top: -45px;">

                                <div class="widget-3-statistics-graph" style="height: 1px!important;">
                                    <div class="widget-3-figure">
                                    </div>
                                </div>
                                <div class="widget-3-statistics">
                                    <div class="widget-3-figure" style="text-align: right;">
                                        <span style="color: #fff">{{ $variants }}</span>
                                    </div>
                                    <div class="widget-3-title" style="color: #fff">
                                        Number of Product Variants
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 card-margin" style="margin-bottom: 33px;">
        <div class="card"
            style="border:none;background: linear-gradient(60deg, #aa0dff, #4765ff)!important;box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);">
            <div class="card-header card-header-icon" data-background-color="purple"
                style="width: 80px;height: 80px;border: none;background-color:#8530ff;">
                <i class="material-icons" style="margin-left: 7px;margin-top: 2px;">book</i>
            </div>
            <div class="card-header no-border"
                style="border-bottom:none!important;background-color: rgb(0 0 0 / 0.0);display: block!important;">
                <h5 class="card-title pull-right" style="color: #fff;text-align: right">Variants Groups</h5>
            </div>
            <div class="card-body">
                <div id="device-overview" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner" style="overflow: visible;">
                        <div class="carousel-item active">
                            <div class="widget-3" style="margin-top: -45px;">

                                <div class="widget-3-statistics-graph" style="height: 1px!important;">
                                    <div class="widget-3-figure">
                                    </div>
                                </div>
                                <div class="widget-3-statistics">
                                    <div class="widget-3-figure" style="text-align: right;">
                                        <span style="color: #fff">{{ $variant_groups }}</span>
                                    </div>
                                    <div class="widget-3-title" style="color: #fff">
                                        Number of Variants Groups
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 card-margin" style="margin-bottom: 45px;">
        <div class="custom_graph" id="container1">

        </div>
    </div>
    <div class="col-lg-6 card-margin">
        <div class="custom_graph" id="container2">

        </div>
    </div>
</div>

@push('additional_scripts')
<script src="{{ asset('plugins/highchart/highcharts.js') }}"></script>
<script src="{{ asset('plugins/highchart/exporting.js') }}"></script>
<script src="{{ asset('plugins/highchart/data.js') }}"></script>
<script src="{{ asset('plugins/highchart/drilldown.js') }}"></script>

<script>
    $(function () {
        Highcharts.chart('container1', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Product Summary as of <?php echo date("F d, Y h:i:s A"); ?>'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: @php echo str_replace('"', "'", $products_names_list) @endphp,
        crosshair: true
    },
        yAxis: {
        min: 0,
        title: {
            text: 'Product Stock'
        }
    },
        tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
        plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
        series: @php echo str_replace('"', "'", $products_list) @endphp
        });
    });
</script>

<script>
    Highcharts.chart('container2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Breakdown of Products,Variants and Variant Groups'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Products,Variants and Variant Groups',
            colorByPoint: true,
            data: @php echo $pie_data @endphp
        }]
    });


</script>

@endpush


@endsection