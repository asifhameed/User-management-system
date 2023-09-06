<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">
        <!--- Sidemenu -->
        
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                @if((has_permission(2,'index-user')) || (has_permission(3,'index-role')))
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i><img src="{{ asset('assets/images/user-icon.png') }}" class="img-fluid" alt="User Icon"/></i><span>User Management<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span></a>
                    <ul class="submenu">
                        @if(has_permission(2,'index-user'))
                        <li><a href="{{ route('users.index') }}"><i class="typcn typcn-media-record"></i> User Listing</a></li>
                        @endif
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-settings m-r-5"></i><span>Settings <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span></a>
                    <ul class="submenu">
                        <!-- <li><a href="#"><i class="mdi mdi-account-circle"></i> Profile</a></li>
                        <li><a href="#"><i class="typcn typcn-lock-closed"></i> Change Password</a></li> -->
                        <li><a href="{{ route('logout') }}"><i class="mdi mdi-power text-white"></i> Logout</a></li>    
                    </ul>
                </li>
                @endif
                
            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
<!-- Sidebar -left -->
</div>