@extends('backend.newlayout')

@section("backendContent")


<div class="content"> 
           
    <div class="intro-y d-flex align-items-center mt-8">
        <h2 class="fs-lg fw-medium me-auto">
            User Profile
        </h2>

    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="d-flex flex-column flex-lg-row border-bottom border-gray-200 dark-border-dark-5 pb-5 mx-n5">
            <div class="d-flex flex-1 px-5 align-items-center justify-content-center justify-content-lg-start">
                <div class="w-20 h-20 w-sm-24 h-sm-24 flex-none w-lg-32 h-lg-32 image-fit position-relative">
                    <img alt="Udayan_Project" class="rounded-circle" src="{{ $user->profile_url }}">
                </div>
                <div class="ms-5">
                    <div class="w-24 w-sm-40 truncate white-space-sm-wrap fw-medium fs-lg">{{ isset($user) ? $user->name : auth()->user()->name; }}</div>
                    <div class="text-gray-600">{{ isset($user) ? $user->designation : auth()->user()->designation }}</div>
                </div>
            </div>
            <div class="mt-6 mt-lg-0 flex-1 dark-text-gray-300 px-5 border-start border-end border-gray-200 dark-border-dark-5 border-top border-top-lg-0 pt-5 pt-lg-0">
                <div class="fw-medium text-center text-lg-start mt-lg-3">Contact Details</div>
                <div class="d-flex flex-column justify-content-center align-items-center align-items-lg-start mt-4">
                    <div class="truncate white-space-sm-normal d-flex align-items-center"> <i data-feather="mail" class="w-4 h-4 me-2"></i> {{ isset($user) ? $user->email : auth()->user()->email; }} </div>
                    <div class="truncate white-space-sm-normal d-flex align-items-center mt-3"> <i data-feather="phone" class="w-4 h-4 me-2"></i> {{ $user->phone   }}</div>
                    <div class="truncate white-space-sm-normal d-flex align-items-center mt-3"> <i data-feather="twitter" class="w-4 h-4 me-2"></i> {{ $user->name  }} </div>
                </div>
            </div>
            {{-- <div class="mt-6 mt-lg-0 flex-1 d-flex align-items-center justify-content-center px-5 border-top border-lg-0 border-gray-200 dark-border-dark-5 pt-5 pt-lg-0">
                <div class="text-center rounded-2 w-20 py-3">
                    <div class="fw-medium text-theme-1 dark-text-theme-10 fs-xl">201</div>
                    <div class="text-gray-600">Orders</div>
                </div>
                <div class="text-center rounded-2 w-20 py-3">
                    <div class="fw-medium text-theme-1 dark-text-theme-10 fs-xl">1k</div>
                    <div class="text-gray-600">Purchases</div>
                </div>
                <div class="text-center rounded-2 w-20 py-3">
                    <div class="fw-medium text-theme-1 dark-text-theme-10 fs-xl">492</div>
                    <div class="text-gray-600">Reviews</div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- END: Account Menu -->

@endsection