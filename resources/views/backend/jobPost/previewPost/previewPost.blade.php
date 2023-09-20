@extends('backend.newlayout')

@section("backendContent")

             <div class="content">                   
                <div class="intro-y news w-xl-3/5 p-5 box mt-8">
                    <!-- BEGIN: Blog Layout -->
                    <h2 class="intro-y fw-medium fs-xl fs-sm-2xl">
                        {{ $getPost->title }}
                    </h2>
                    <div class="intro-y text-gray-700 dark-text-gray-600 mt-3 fs-xs fs-sm-sm"> {{ $getPost->post_date }}</div>
                    <div class="intro-y mt-6">
                        <div class="news__preview image-fit">
                            <img alt="Rubick Bootstrap HTML Admin Template" class="rounded-2" src="{{ $getPost->img_url }}">
                        </div>
                    </div>
                   
                    <div class="intro-y text-justify lh-lg mt-5">
                        {!!$getPost->details!!}
                    </div>
                    <div class="intro-y text-justify lh-lg">
                        <table class="table mt-5">
                            <tr>
                                <th>Location</th>
                                <td>{{ $getPost->location }}</td>
                            </tr>
                            <tr>
                                <th>Job nature</th>
                                <td>{{ $getPost->job_nature }}</td>
                            </tr>
                            <tr>
                                <th>Salary</th>
                                <td>{{ $getPost->salary }}</td>
                            </tr>
                            <tr>
                                <th>Application Date</th>
                                <td>{{ $getPost->application_date }}</td>
                            </tr>
                            <tr>
                                <th>Company Name</th>
                                <td>{{ $getPost->company_name }}</td>
                            </tr>
                            <tr>
                                <th>Website</th>
                                <td>{{ $getPost->website_url }}</td>
                            </tr>
                            <tr>
                                <th>Company Email</th>
                                <td>{{ $getPost->email }}</td>
                            </tr>
                            <tr>
                                <th>Profile</th>
                                <td>{{ $getPost->profile }}</td>
                            </tr>
                            <tr>
                                <th>Company Type</th>
                                <td>{{ $getPost->company_type }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="intro-y d-flex fs-xs fs-sm-sm flex-column flex-sm-row align-items-center mt-5 pt-5 border-top border-gray-200 dark-border-dark-5">
                        <div class="d-flex align-items-center">
                            <div class="w-12 h-12 flex-none image-fit">
                                <img alt="udayan_project" class="rounded-circle" src="{{ $getPost->user->profile_url }}">
                            </div>
                            <div class="ms-3 me-auto">
                                <a href="{{ route('profile.show',$getPost->user->id) }}" class="fw-medium">{{ $getPost->user->name }}</a>
                                <div class="text-gray-600">{{ $getPost->user->designation }}</div>
                            </div>
                        </div>
                        {{-- <div class="d-flex align-items-center text-gray-700 dark-text-gray-600 ms-sm-auto mt-5 mt-sm-0">
                            Share this post: 
                            <a href="#" class="w-8 h-8 w-sm-10 h-sm-10 rounded-circle d-flex align-items-center justify-content-center border dark-border-dark-5 ms-2 text-gray-500 zoom-in tooltip" title="Facebook"> <i class="w-3 h-3 fill-current" data-feather="facebook"></i> </a>
                            <a href="#" class="w-8 h-8 w-sm-10 h-sm-10 rounded-circle d-flex align-items-center justify-content-center border dark-border-dark-5 ms-2 text-gray-500 zoom-in tooltip" title="Twitter"> <i class="w-3 h-3 fill-current" data-feather="twitter"></i> </a>
                            <a href="#" class="w-8 h-8 w-sm-10 h-sm-10 rounded-circle d-flex align-items-center justify-content-center border dark-border-dark-5 ms-2 text-gray-500 zoom-in tooltip" title="Linked In"> <i class="w-3 h-3 fill-current" data-feather="linkedin"></i> </a>
                        </div> --}}
                    </div>
                    <!-- END: Blog Layout -->
                 
                </div>
                
            </div>
       
@endsection