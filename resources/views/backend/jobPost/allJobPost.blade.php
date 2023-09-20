
@extends('backend.newlayout')

@section("backendContent")          
            <div class="content">
          
               
                <div class="intro-y grid columns-12 gap-6 mt-5">
                    <!-- BEGIN: Blog Layout -->

                    @foreach ($jobPosts as $jobpost)
                        <div class="intro-y g-col-12 g-col-md-6 g-col-xl-4 box">
                            <div class="d-flex align-items-center border-bottom border-gray-200 dark-border-dark-5 px-5 py-4">
                                <div class="w-10 h-10 flex-none image-fit">
                                    <img alt="Rubick Bootstrap HTML Admin Template" class="rounded-circle" src="{{ $jobpost->user->profile_url }}">
                                </div>
                                <div class="ms-3 me-auto">
                                    <a href="{{ route('profile.show',$jobpost->user->id) }}" class="fw-medium">{{ $jobpost->user->name }}</a> 
                                    <div class="d-flex text-gray-600 truncate fs-xs mt-0.5">
                                        <a class="text-theme-1 dark-text-gray-500 d-inline-block truncate" href="#">
                                            {{ $jobpost->user->designation }}
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown ms-3">
                                    <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-gray-600 dark-text-gray-300" aria-expanded="false" data-bs-toggle="dropdown"> <i data-feather="more-vertical" class="w-4 h-4"></i> </a>
                                    <div class="dropdown-menu w-40">
                                        <ul class="dropdown-content">
                                            <li>
                                                <a href="{{ route('jobPost.edit',$jobpost->slug) }}" class="dropdown-item"> <i data-feather="edit-2" class="w-4 h-4 me-2"></i> Edit Post </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('jobPost.delete',$jobpost->user_id) }}" class="dropdown-item"> <i data-feather="trash" class="w-4 h-4 me-2"></i> Delete Post </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="h-40 h-xxl-56 image-fit">
                                    <img alt="Rubick Bootstrap HTML Admin Template" class="rounded-2" src="{{ $jobpost->img_url }}">
                                </div>
                                <a href="#" class="d-block fw-medium fs-base mt-5">{{ $jobpost->title }}</a> 
                                <div class="text-gray-700 dark-text-gray-600 mt-2">{!! $jobpost->details !!}</div>
                            </div>
                         
                            <div class="px-5 pt-3 pb-5 border-top border-gray-200 dark-border-dark-5">
                                <div class="w-full d-flex text-gray-600 fs-xs fs-sm-sm">
                                    {{-- <div class="me-2"> Views: <span class="fw-medium">34k</span> </div> --}}
                                    {{-- <div class="ms-auto"> Apply: <span class="fw-medium">24</span> </div> --}}
                                </div>

                                @role('admin')
                                <a href="{{ route('jobPost.acceptAdmin',$jobpost->id) }}" class="btn btn-{{ $jobpost->check == 0 ? 'primary' : 'success' }} mt-5">
                                    {{ $jobpost->check == 0 ? 'Accept' : 'Reject' }}
                                </a>
                                @endrole

                                @role('admin')
                                <a href="{{ route('jobPost.rejectAdmin',$jobpost->id) }}" class="btn btn-danger mt-5">
                                    Delete
                                </a>
                                @endrole

                                <a href="{{ route('jobPost.preview',$jobpost->slug) }}" class="btn btn-warning mt-3">
                                    <i class="w-4 h-4 me-2" data-feather="eye"></i>Preview
                                </a>
                            
                            </div>
                        
                        </div>
                    @endforeach


                   
                    <!-- END: Blog Layout -->
                    
                </div>
            </div>
@endsection