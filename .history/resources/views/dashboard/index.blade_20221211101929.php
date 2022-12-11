@extends("layouts.main")

@section("main-content")

<div class="row">
    <div class="col-lg-4 card-margin " style="margin-bottom: 33px;">
        <div class="card "
            style="border:none;background: linear-gradient(60deg, #765fff, #a115ff)!important;box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);">
            <div class="card-header card-header-icon" data-background-color="purple"
                style="width: 80px;height: 80px;border: none;background-color:#8530ff;">
                <i class="material-icons" style="margin-left: 7px;margin-top: 2px;">groups</i>
            </div>
            <div class="card-header no-border"
                style="border-bottom:none!important;background-color: rgb(0 0 0 / 0.0);display: block;!important;">
                <h5 class="card-title pull-right" style="color: #fff;text-align: right">Active Applicants</h5>
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
                                        <span style="color: #fff">222</span>
                                    </div>
                                    <div class="widget-3-title" style="color: #fff">
                                        Number of Applicants Listed
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 card-margin" style="margin-bottom: 33px;">
        <div class="card"
            style="border:none;background: linear-gradient(60deg, #aa0dff, #4765ff)!important;box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);">
            <div class="card-header card-header-icon" data-background-color="purple"
                style="width: 80px;height: 80px;border: none;background-color:#8530ff;">
                <i class="material-icons" style="margin-left: 7px;margin-top: 2px;">person</i>
            </div>
            <div class="card-header no-border"
                style="border-bottom:none!important;background-color: rgb(0 0 0 / 0.0);display: block;!important;">
                <h5 class="card-title pull-right" style="color: #fff;text-align: right">Executives</h5>
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
                                        <span style="color: #fff">33</span>
                                    </div>
                                    <div class="widget-3-title" style="color: #fff">
                                        Number of Member Executives
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 card-margin" style="margin-bottom: 33px;">
        <div class="card"
            style="border:none;background: linear-gradient(60deg, #aa0dff, #4765ff)!important;box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);">
            <div class="card-header card-header-icon" data-background-color="purple"
                style="width: 80px;height: 80px;border: none;background-color:#8530ff;">
                <i class="material-icons" style="margin-left: 7px;margin-top: 2px;">security</i>
            </div>
            <div class="card-header no-border"
                style="border-bottom:none!important;background-color: rgb(0 0 0 / 0.0);display: block;!important;">
                <h5 class="card-title pull-right" style="color: #fff;text-align: right">Active SystemUsers</h5>
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
                                        <span style="color: #fff">333</span>
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
</div>

@endsection