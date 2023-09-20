
        
            <!-- BEGIN: Content -->
            <div class="content"> 
           
                <div class="intro-y d-flex align-items-center mt-8">
                    <h2 class="fs-lg fw-medium me-auto">
                        Profile Layout
                    </h2>

                </div>
                <!-- BEGIN: Profile Info -->
                <div class="intro-y box px-5 pt-5 mt-5">
                    <div class="d-flex flex-column flex-lg-row border-bottom border-gray-200 dark-border-dark-5 pb-5 mx-n5">
                        <div class="d-flex flex-1 px-5 align-items-center justify-content-center justify-content-lg-start">
                            <div class="w-20 h-20 w-sm-24 h-sm-24 flex-none w-lg-32 h-lg-32 image-fit position-relative">
                                <img alt="Udayan_Project" class="rounded-circle" src="{{ auth()->user()->profile_url ? auth()->user()->profile_url: "https://api.dicebear.com/7.x/initials/svg?seed=".str(auth()->user()->name)->headline()  }}">
                            </div>
                            <div class="ms-5">
                                <div class="w-24 w-sm-40 truncate white-space-sm-wrap fw-medium fs-lg">{{ auth()->user()->name; }}</div>
                                <div class="text-gray-600">{{ auth()->user()->designation }}</div>
                            </div>
                        </div>
                        <div class="mt-6 mt-lg-0 flex-1 dark-text-gray-300 px-5 border-start border-end border-gray-200 dark-border-dark-5 border-top border-top-lg-0 pt-5 pt-lg-0">
                            <div class="fw-medium text-center text-lg-start mt-lg-3">Contact Details</div>
                            <div class="d-flex flex-column justify-content-center align-items-center align-items-lg-start mt-4">
                                <div class="truncate white-space-sm-normal d-flex align-items-center"> <i data-feather="mail" class="w-4 h-4 me-2"></i> {{ auth()->user()->email; }} </div>
                                <div class="truncate white-space-sm-normal d-flex align-items-center mt-3"> <i data-feather="phone" class="w-4 h-4 me-2"></i> {{ auth()->user()->phone; }} </div>
                                <div class="truncate white-space-sm-normal d-flex align-items-center mt-3"> <i data-feather="twitter" class="w-4 h-4 me-2"></i> {{ auth()->user()->name; }}</div>
                            </div>
                        </div>
                  
                    </div>
                    
                   
                   
                    <ul class="nav nav-link-tabs flex-column flex-sm-row justify-content-center justify-content-lg-start" role="tablist">                                       
                       <li id="profile-tab" class="nav-item" role="presentation">
                      <a href="javascript:;" class="nav-link px-0 me-sm-8 d-flex align-items-center active" data-bs-toggle="pill" data-bs-target="#profile" role="tab" aria-controls="profile-tab" aria-selected="true"> <i class="w-4 h-4 me-2" data-feather="user"></i> Profile </a>
                        </li>
                        <li id="account-tab" class="nav-item" role="presentation">
                           <a href="{{ route("profile.account") }}" class="nav-link px-0 me-sm-8 d-flex align-items-center" data-bs-target="#account" role="tab" aria-controls="account-tab" aria-selected="false"> <i class="w-4 h-4 me-2" data-feather="shield"></i> Account </a>
                        </li>
                        <li id="change-password-tab" class="nav-item" role="presentation">
                            <a href="{{ route("profile.passwordChange") }}" class="nav-link px-0 me-sm-8 d-flex align-items-center"  data-bs-target="#change-password" role="tab" aria-controls="change-password-tab" aria-selected="false"> <i class="w-4 h-4 me-2" data-feather="lock"></i> Change Password </a>
                        </li>                                        
                    </ul> 

           
                </div>
                <!-- END: Profile Info -->
            
            </div>
            <!-- END: Content -->


           

       
    