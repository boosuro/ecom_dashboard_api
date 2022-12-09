<div class="profile-overlay" style="background: linear-gradient(60deg, #4765ff , #aa0dff);border-left:none!important; ">
    <div class="title-head"   style="background: none!important;">
        <h4>{{ trans('lang.profile') }}</h4>
    </div>
    <div class="profile-header"  >
        <div class="d-flex justify-content-between">
            <i data-feather="arrow-left-circle" class="profile-close text-white"></i>
            <a href="{!! url('/logout') !!}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i data-feather="log-out" class="profile-close text-white"></i></a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <div class="user-info">
            <div class="user-pic">
                {{-- <?php //if($loggedUser->photo_url){ ?>
                    <img src="<?php //echo base_url($loggedUser->photo_url); ?>" alt="Profile Picture" class="rounded-circle"/>
                <?php //} ?> --}}
            </div>
            <div class="primary-info text-center">
                <h3><a class="name d-block" href="#" style="color: #fff">{{ auth()->user()->name }}</a></h3>
                {{-- <p class="designation" style="color: #fff"><?php //echo $usertype ?></p> --}}
            </div>
        </div>

    </div>
    <div class="profile-body">
        <div class="body-wrapper">
            <div class="project-stat">
            </div>
            <div class="account-stat">
            </div>
        </div>
    </div>
</div>