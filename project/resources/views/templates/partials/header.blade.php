<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{ route('users.index') }}" class="logo">
            <span><img src="{{ asset('assets/images/logo-white.png') }}" alt="" height="50" class="img-fluid"> </span>
            <i><img src="{{ asset('assets/images/logo-small.png') }}" alt="" height="35"></i>
        </a>
    </div>
    <nav class="navbar-custom">
        <!-- Menu right-->
        <ul class="navbar-right list-inline float-right mb-0">
            
            <li class="dropdown notification-list list-inline-item">
                <div class="dropdown notification-list nav-pro-img">
                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="mr-3 small">{{{ (Auth::user()->name) ?? Auth::user()->email }}}</span>
                    <img src="{{ asset(config('constants._USER_DUMMY_IMAGE')) }}" class="rounded-circle" alt="{{{ (Auth::user()->name) ?? Auth::user()->email }}}"/>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                    <div class=" dropdown-header">
                        <h6 class="text-overflow m-0 font-weight-normal small">Hello {{{ (Auth::user()->name) ?? Auth::user()->email }}}</h6>
                        </div>
                    <!-- item--> 
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="mdi mdi-power text-danger"></i> Logout</a>
                </div>
                </div>
            </li>
        </ul>
        <!-- Menu Left-->
        <ul class="list-inline menu-left mb-0">
            <li class="float-left"><button class="button-menu-mobile open-left waves-effect"><i class="mdi mdi-menu"></i></button></li>
            <!-- <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                <form role="search" class="app-search">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control" placeholder="Search.." /> <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </li> -->
        </ul>
    </nav>
</div>