<nav class="navbar fixed-top d-flex flex-row">
    <div class="navbar-menu-container d-flex align-items-center justify-content-center">
        <div class="text-center navbar-brand-container align-items-center justify-content-center">
            <a class="brand-logo" href="{{ url('/') }}"><img src="{{ asset('dist/images/logo.png') }}"
                    alt="{{  config('app.name', 'OrdersPackPHPTest')  }} - Dashboard"
                    title="{{  config('app.name', 'OrdersPackPHPTest')  }} - Dashboard" /></a>
        </div>
        <div class="sub-header">
            <h4 class="page-title text-center">{{ config('app.name', 'OrdersPackPHPTest') }}</h4>
        </div>
        <!-- partial:../../partials/_navbar.html -->
        <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item nav-profile">
                <a class="nav-link" href="#" id="profileToolbar">
                    <i data-feather="user" class="mx-0"></i>
                </a>
            </li>
            <li class="nav-item mobile-sidebar">
                <button class="nav-link navbar-toggler navbar-toggler-right align-self-center" type="button"
                    data-toggle="msb-sidebar">
                    <i data-feather="align-right"></i>
                </button>
            </li>
        </ul>
        <!-- partial -->
    </div>
</nav>
<div class="d-flex w-100">
    <!-- partial:_sidebar -->
    <nav class="navbar-container flex-row" id="navbar">
        <div class="primary" style="background: #4e60ff;">
            <div class="text-center navbar-brand-container d-flex align-items-center justify-content-center">
                <a class="brand-logo" href="{{ url('/dashboard') }}"><img src="{{ asset('dist/images/logo.png') }}"
                        alt="{{  config('app.name', 'OrdersPackPHPTest')  }} - Dashboard"
                        title="{{  config('app.name', 'OrdersPackPHPTest')  }} - Dashboard" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}" data-toggle="tooltip" data-placement="right"
                        data-original-title="Quick Link - Dashboard" data-skin-class="tooltip-base">
                        <i data-feather="home"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="secondary">
            <div class="sub-header">
                <h4>{{ config('app.name', 'OrdersPackPHPTest') }}</h4>
            </div>
            <div class="nav-wrapper">
                <ul class="nav">
                    <li class="nav-header">Dashboard</li>
                    {# <li class="nav-item {{ Request::is(" dashboard*") | Request::is("/") ? 'active' :'' }}">
                        <a class="nav-link" href="{{ url('/') }}">
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li> #}
                    {# <li class="nav-header">Cuisine</li>
                    <li class="nav-item  {{ Request::is(" cuisines*") ? 'active' :'' }}">
                        <a class="nav-link" href="{{ url('/') }}">
                            <span class="menu-title">CuisineS</span>
                        </a>
                    </li> #}

                </ul>
            </div>
        </div>
    </nav>
    <!-- partial -->
</div>