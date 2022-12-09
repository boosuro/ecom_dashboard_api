<nav class="navbar fixed-top d-flex flex-row">
    <div class="navbar-menu-container d-flex align-items-center justify-content-center">
        <div class="text-center navbar-brand-container align-items-center justify-content-center">
            <a class="brand-logo" href="{{ url('/') }}"><img src="{{ asset('dist/images/logo.png') }}" alt="{{  config('app.name', 'Area Joint')  }} - {{ trans('lang.dashboard') }}"
                                                                       title="{{  config('app.name', 'Area Joint')  }} - {{ trans('lang.dashboard') }}"/></a>
        </div>
        <div class="sub-header">
            <h4 class="page-title text-center">{{ config('app.name', 'Area Joint') }}</h4>
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
                <a class="brand-logo" href="{{ url('/') }}"><img src="{{ asset('dist/images/logo.png') }}" alt="{{  config('app.name', 'Area Joint')  }} - {{ trans('lang.dashboard') }}"
                                                                           title="{{  config('app.name', 'Area Joint')  }} - {{ trans('lang.dashboard') }}"/></a>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}" data-toggle="tooltip" data-placement="right" data-original-title="{{ trans('lang.quick_link') }} - {{ trans('lang.dashboard') }}" data-skin-class="tooltip-base">
                        <i data-feather="home"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class ="secondary">
            <div class="sub-header">
                <h4>{{ config('app.name', 'Area Joint') }}</h4>
            </div>
            <div class="nav-wrapper">
                <ul class="nav">
                    <li class="nav-header">{{ trans('lang.dashboard') }}</li>
                    <li class="nav-item {{ Request::is("dashboard*") | Request::is("/") ? 'active' :'' }}">
                        <a class="nav-link" href="{{ url('/') }}">
                            <span class="menu-title">{{ trans('lang.dashboard') }}</span>
                        </a>
                    </li>
                    <li class="nav-header">{{ trans('lang.cuisine') }}</li>
                    <li class="nav-item  {{ Request::is("cuisines*") ? 'active' :'' }}">
                        <a class="nav-link" href="{{ route('cuisines.index') }}">
                            <span class="menu-title">{{ trans('lang.cuisine_plural') }}</span>
                        </a>
                    </li>
                    <li class="nav-header">{{ trans('lang.restaurant_management') }}</li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#restaurants_list" aria-expanded="false" aria-controls="restaurants_list">
                            <span class="menu-title">{{ trans('lang.restaurants_list') }}</span>
                            <i data-feather="chevron-right" class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="restaurants_list">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item   {{ Request::is("pending-restaurants") ? 'active' :'' }}" ><a class="nav-link" href="{{ route('pending.restaurants.index') }}">{{ trans('lang.restaurants_pending') }}</a></li>
                                <li class="nav-item   {{ Request::is("restaurants*") ? 'active' :'' }}" ><a class="nav-link" href="{{ route('restaurants.index') }}">{{ trans('lang.restaurants_plural') }}</a></li>
                                <li class="nav-item   {{ Request::is("galleries*") ? 'active' :'' }}" ><a class="nav-link" href="{{ route('galleries.index') }}">{{ trans('lang.gallery_plural') }}</a></li>
                                <li class="nav-item   {{ Request::is("restaurant-reviews*") ? 'active' :'' }}" ><a class="nav-link" href="{{ route('restaurant-reviews.index') }}">{{ trans('lang.restaurant_review_plural') }}</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-header">{{ trans('lang.category_management') }}</li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#category_list" aria-expanded="false" aria-controls="category_list">
                            <span class="menu-title">{{ trans('lang.categories_list') }}</span>
                            <i data-feather="chevron-right" class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="category_list">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item   {{ Request::is("categories*") ? 'active' :'' }}" ><a class="nav-link" href="{{ route('categories.index') }}">{{ trans('lang.category_plural') }}</a></li>
                                <li class="nav-item   {{ Request::is("sub-categories*") ? 'active' :'' }}" ><a class="nav-link" href="{{ route('sub-categories.index') }}">{{ trans('lang.sub_category_plural') }}</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-header">{{ trans('lang.food_management') }}</li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#food_list" aria-expanded="false" aria-controls="food_list">
                            <span class="menu-title">{{ trans('lang.food_list') }}</span>
                            <i data-feather="chevron-right" class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="food_list">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item   {{ Request::is("foods*") ? 'active' :'' }}" ><a class="nav-link" href="{{ route('foods.index') }}">{{ trans('lang.foods_plural') }}</a></li>
                                <li class="nav-item   {{ Request::is("food-addon-groups*") ? 'active' :'' }}" ><a class="nav-link" href="{{ route('food-addon-groups.index') }}">{{ trans('lang.food_addon_groups_plural') }}</a></li>
                                <li class="nav-item   {{ Request::is("food-addons*") ? 'active' :'' }}" ><a class="nav-link" href="{{ route('food-addons.index') }}">{{ trans('lang.food_addon_plural') }}</a></li>
                                <li class="nav-item   {{ Request::is("food-reviews*") ? 'active' :'' }}" ><a class="nav-link" href="{{ route('food-reviews.index') }}">{{ trans('lang.food_review_plural') }}</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-header">{{ trans('lang.order_management') }}</li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#order_list" aria-expanded="false" aria-controls="order_list">
                            <span class="menu-title">{{ trans('lang.order_list') }}</span>
                            <i data-feather="chevron-right" class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="order_list">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item   {{ Request::is("orders*") ? 'active' :'' }}" ><a class="nav-link" href="{{ route('orders.index') }}">{{ trans('lang.orders_plural') }}</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-header">{{ trans('lang.coupon_management') }}</li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#coupon_list" aria-expanded="false" aria-controls="coupon_list">
                            <span class="menu-title">{{ trans('lang.coupon_list') }}</span>
                            <i data-feather="chevron-right" class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="coupon_list">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item   {{ Request::is("coupons*") ? 'active' :'' }}" ><a class="nav-link" href="{{ route('coupons.index') }}">{{ trans('lang.coupons_plural') }}</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-header">{{ trans('lang.delivery_agent_management') }}</li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#delivery_agent_list" aria-expanded="false" aria-controls="delivery_agent_list">
                            <span class="menu-title">{{ trans('lang.delivery_agent_list') }}</span>
                            <i data-feather="chevron-right" class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="delivery_agent_list">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item   {{ Request::is("delivery-agents*") ? 'active' :'' }}" ><a class="nav-link" href="{{ route('delivery-agents.index') }}">{{ trans('lang.delivery_agents_plural') }}</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-header">{{ trans('lang.payments_management') }}</li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#payment_list" aria-expanded="false" aria-controls="payment_list">
                            <span class="menu-title">{{ trans('lang.payment_list') }}</span>
                            <i data-feather="chevron-right" class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="payment_list">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item   {{ Request::is("payout-setups*") ? 'active' :'' }}" ><a class="nav-link" href="{{ route('payout-setups.index') }}">{{ trans('lang.payout_setups_plural') }}</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- partial -->
</div>
