{{-- @extends('backend.newlayout')

@section("sidebarContent")
         <!-- BEGIN: Side Menu --> --}}
       
        
            <ul>
                <li>
                    <a href="javascript:;" class="side-menu side-menu--active side-menu--open">
                        <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                        <div class="side-menu__title">
                            Dashboard 
                            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                        </div>
                    </a>

                </li>

                @role('admin')
                <li>
                    <a href="{{ route('banner.change') }}" class="side-menu menu ">
                        <div class="menu__icon"><i data-feather="file-text"></i></div>
                        <div class="menu__title"> &nbsp;&nbsp;Banner Moto </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.all') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="side-menu__title"> Categories </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('subCategories.all') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                        <div class="side-menu__title"> Sub-Categories </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('usersManagement.all') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="side-menu__title">Users lists </div>
                    </a>
                </li>
                @endrole

                <li>
                    <a href="{{ route('jobPost.create') }}" class="side-menu menu ">
                        <div class="menu__icon"><i data-feather="file-text"></i></div>
                        <div class="menu__title"> &nbsp;&nbsp; Make Job Post </div>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('jobPost.preview.allPost') }}" class="side-menu menu ">
                        <div class="menu__icon"><i data-feather="corner-down-right"></i></div>
                        <div class="menu__title"> &nbsp;&nbsp;See All Job Post </div>
                    </a>
                </li>

                  
                <li>
                    <a href="{{ route('appications.all') }}" class="side-menu menu ">
                        <div class="menu__icon"><i data-feather="file-text"></i></div>
                        <div class="menu__title"> &nbsp;&nbsp;See All Application </div>
                    </a>
                </li>


            </ul>
       
        {{-- <!-- END: Side Menu -->
@endsection --}}