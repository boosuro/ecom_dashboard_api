@extends('layouts.app')

@section('content')

<div class="main-container">
    <div class="container-fluid page-body-wrapper">

        <!-- PROFILE OVERLAY -->
        @include('layouts.components.profile_overlay')
        <!-- PROFILE OVERLAY ENDS -->

        <!-- NAV ITEMS -->
        @include('layouts.components.leftmenu')
        <!-- NAV ITEMS ENDS -->

        <div class="main-panel">
            <!-- WRAPPER -->
            <div class="content-wrapper" id="bonvinco" style="background: #4765ff1c;">
                <br>
                @include('flash::message')
                @yield('main-content')
            </div>
            <!-- WRAPPER ENDS -->

            <!-- FOOTER ITEMS -->
            @include('layouts.components.footer')
            <!-- FOOTER ITEMS ENDS -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

@endsection