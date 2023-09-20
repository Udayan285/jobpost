@extends('backend.newlayout')

@section("backendContent")
        
    <!-- BEGIN: Content -->
    <div class="content">
    
        <h2 class="intro-y fs-lg fw-medium mt-10">
           All Users List
        </h2>
        <div class="grid columns-12 gap-6 mt-5">
            {{-- <div class="intro-y g-col-12 d-flex flex-wrap flex-sm-nowrap align-items-center mt-2">
                <button class="btn btn-primary shadow-md me-2">Add New User</button>
                <div class="dropdown">
                    <button class="dropdown-toggle btn px-2 box text-gray-700 dark-text-gray-300" aria-expanded="false" data-bs-toggle="dropdown">
                        <span class="w-5 h-5 d-flex align-items-center justify-content-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                    </button>
                    <div class="dropdown-menu w-40">
                        <div class="dropdown-content">
                            <a href="side-menu-light-users-layout-3.html" class="dropdown-item"> <i data-feather="users" class="w-4 h-4 me-2"></i> Add Group </a>
                            <a href="side-menu-light-users-layout-3.html" class="dropdown-item"> <i data-feather="message-circle" class="w-4 h-4 me-2"></i> Send Message </a>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>
                <div class="w-full w-sm-auto mt-3 mt-sm-0 ms-sm-auto ms-md-0">
                    <div class="w-56 position-relative text-gray-700 dark-text-gray-300">
                        <input type="text" class="form-control w-56 box border-white dark-border-dark-3 pe-10 placeholder-theme-13" placeholder="Search...">
                        <i class="w-4 h-4 position-absolute my-auto top-0 bottom-0 me-3 end-0" data-feather="search"></i> 
                    </div>
                </div>
            </div> --}}


            <!-- BEGIN: Users Layout -->
            @foreach ($users as $user)
                <div class="intro-y g-col-12 g-col-md-6 g-col-lg-4">
                    <div class="box">
                        <div class="d-flex align-items-start px-5 pt-5">
                            <div class="w-full d-flex flex-column flex-lg-row align-items-center">
                                <div class="w-16 h-16 image-fit">                         
                                    <img alt="Udayan_Project" class="rounded-circle" src="{{ $user->profile_url ? $user->profile_url: "https://api.dicebear.com/7.x/initials/svg?seed=".str($user->name)->headline()  }}">
                                </div>
                                <div class="ms-lg-4 text-center text-lg-start mt-3 mt-lg-0">
                                    <a href="side-menu-light-users-layout-3.html" class="fw-medium">{{ $user->name }}</a> 
                                    <div class="text-gray-600 fs-xs mt-0.5">{{ $user->designation }}</div>
                                </div>
                            </div>
                            <div class="position-absolute end-0 top-0 me-5 mt-3 dropdown">
                                <a class="dropdown-toggle w-5 h-5 d-block" href="javascript:;" aria-expanded="false" data-bs-toggle="dropdown"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark-text-gray-300"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="side-menu-light-users-layout-3.html" class="dropdown-item"> <i data-feather="edit-2" class="w-4 h-4 me-2"></i> Edit </a>
                                        </li>
                                        <li>
                                            <a href="side-menu-light-users-layout-3.html" class="dropdown-item"> <i data-feather="trash" class="w-4 h-4 me-2"></i> Delete </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-lg-start p-5">
                            <div>{!! $user->description !!}</div>
                            <div class="d-flex align-items-center justify-content-center justify-content-lg-start text-gray-600 mt-5"> <i data-feather="mail" class="w-3 h-3 me-2"></i>{{ $user->email }}</div>
                        </div>
                        <div class="text-center text-lg-end p-5 border-top border-gray-200 dark-border-dark-5">
                           <a href="{{ route('usersManagement.ban',$user->id) }}" class="btn btn-{{ $user->ban_user == 0 ? 'danger' : 'success' }} py-1 px-2 me-2">{{ $user->ban_user == 0 ? 'Ban' : 'Undo Ban' }}</a>
                            <a href="{{ route('profile.show',$user->id) }}" class="btn btn-outline-secondary py-1 px-2">Profile</a>
                        </div>
                    </div>
                </div>
            @endforeach
          

{{--             
            <div class="intro-y g-col-12 g-col-md-6 g-col-lg-4">
                <div class="box">
                    <div class="d-flex align-items-start px-5 pt-5">
                        <div class="w-full d-flex flex-column flex-lg-row align-items-center">
                            <div class="w-16 h-16 image-fit">
                                <img alt="Rubick Bootstrap HTML Admin Template" class="rounded-circle" src="{{ asset('backend/dist/images/profile-7.jpg') }}">
                            </div>
                            <div class="ms-lg-4 text-center text-lg-start mt-3 mt-lg-0">
                                <a href="side-menu-light-users-layout-3.html" class="fw-medium">Robert De Niro</a> 
                                <div class="text-gray-600 fs-xs mt-0.5">Frontend Engineer</div>
                            </div>
                        </div>
                        <div class="position-absolute end-0 top-0 me-5 mt-3 dropdown">
                            <a class="dropdown-toggle w-5 h-5 d-block" href="javascript:;" aria-expanded="false" data-bs-toggle="dropdown"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark-text-gray-300"></i> </a>
                            <div class="dropdown-menu w-40">
                                <ul class="dropdown-content">
                                    <li>
                                        <a href="side-menu-light-users-layout-3.html" class="dropdown-item"> <i data-feather="edit-2" class="w-4 h-4 me-2"></i> Edit </a>
                                    </li>
                                    <li>
                                        <a href="side-menu-light-users-layout-3.html" class="dropdown-item"> <i data-feather="trash" class="w-4 h-4 me-2"></i> Delete </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="text-center text-lg-start p-5">
                        <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start text-gray-600 mt-5"> <i data-feather="mail" class="w-3 h-3 me-2"></i> robertdeniro@left4code.com </div>
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start text-gray-600 mt-1"> <i data-feather="instagram" class="w-3 h-3 me-2"></i> Robert De Niro </div>
                    </div>
                    <div class="text-center text-lg-end p-5 border-top border-gray-200 dark-border-dark-5">
                        <button class="btn btn-danger py-1 px-2 me-2">Ban</button>
                        <button class="btn btn-outline-secondary py-1 px-2">Profile</button>
                    </div>
                </div>
            </div>
            <div class="intro-y g-col-12 g-col-md-6 g-col-lg-4">
                <div class="box">
                    <div class="d-flex align-items-start px-5 pt-5">
                        <div class="w-full d-flex flex-column flex-lg-row align-items-center">
                            <div class="w-16 h-16 image-fit">
                                <img alt="Rubick Bootstrap HTML Admin Template" class="rounded-circle" src="{{ asset('backend/dist/images/profile-14.jpg') }}">
                            </div>
                            <div class="ms-lg-4 text-center text-lg-start mt-3 mt-lg-0">
                                <a href="side-menu-light-users-layout-3.html" class="fw-medium">Kevin Spacey</a> 
                                <div class="text-gray-600 fs-xs mt-0.5">Frontend Engineer</div>
                            </div>
                        </div>
                        <div class="position-absolute end-0 top-0 me-5 mt-3 dropdown">
                            <a class="dropdown-toggle w-5 h-5 d-block" href="javascript:;" aria-expanded="false" data-bs-toggle="dropdown"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark-text-gray-300"></i> </a>
                            <div class="dropdown-menu w-40">
                                <ul class="dropdown-content">
                                    <li>
                                        <a href="side-menu-light-users-layout-3.html" class="dropdown-item"> <i data-feather="edit-2" class="w-4 h-4 me-2"></i> Edit </a>
                                    </li>
                                    <li>
                                        <a href="side-menu-light-users-layout-3.html" class="dropdown-item"> <i data-feather="trash" class="w-4 h-4 me-2"></i> Delete </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="text-center text-lg-start p-5">
                        <div>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start text-gray-600 mt-5"> <i data-feather="mail" class="w-3 h-3 me-2"></i> kevinspacey@left4code.com </div>
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start text-gray-600 mt-1"> <i data-feather="instagram" class="w-3 h-3 me-2"></i> Kevin Spacey </div>
                    </div>
                    <div class="text-center text-lg-end p-5 border-top border-gray-200 dark-border-dark-5">
                        <button class="btn btn-danger py-1 px-2 me-2">Ban</button>
                        <button class="btn btn-outline-secondary py-1 px-2">Profile</button>
                    </div>
                </div>
            </div> --}}
           
            <!-- END: Users Layout -->

            <!-- BEGIN: Pagination -->
            {{-- <div class="intro-y g-col-12 d-flex flex-wrap flex-sm-row flex-sm-nowrap align-items-center">
                <nav class="w-full w-sm-auto me-sm-auto">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="side-menu-light-users-layout-3.html#"> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="side-menu-light-users-layout-3.html#"> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
                        </li>
                        <li class="page-item"> <a class="page-link" href="side-menu-light-users-layout-3.html#">...</a> </li>
                        <li class="page-item"> <a class="page-link" href="side-menu-light-users-layout-3.html#">1</a> </li>
                        <li class="page-item active"> <a class="page-link" href="side-menu-light-users-layout-3.html#">2</a> </li>
                        <li class="page-item"> <a class="page-link" href="side-menu-light-users-layout-3.html#">3</a> </li>
                        <li class="page-item"> <a class="page-link" href="side-menu-light-users-layout-3.html#">...</a> </li>
                        <li class="page-item">
                            <a class="page-link" href="side-menu-light-users-layout-3.html#"> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="side-menu-light-users-layout-3.html#"> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
                        </li>
                    </ul>
                </nav>
                <select class="w-20 form-select box mt-3 mt-sm-0">
                    <option>10</option>
                    <option>25</option>
                    <option>35</option>
                    <option>50</option>
                </select>
            </div> --}}
            <!-- END: Pagination -->

        </div>
    </div>
    <!-- END: Content -->

@endsection