@extends('backend.newlayout')

@section("backendContent")

<div class="content">
 <form form action="{{ isset($specificPost) ? route('jobPost.update',$specificPost->slug) :  route('jobPost.store') }}" enctype="multipart/form-data" method="POST" >
    @csrf
    <div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
        <h2 class="fs-lg fw-medium me-auto">
            {{ isset($specificPost) ? 'Edit' : 'Add' }} New Job Post
        </h2>
        <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
            
            {{-- <a href="{{ route('jobPost.preview') }}" type="button" class="btn box text-gray-700 dark-text-gray-300 me-2 d-flex align-items-center ms-auto ms-sm-0"> <i class="w-4 h-4 me-2" data-feather="eye"></i> Preview </a> --}}
            <div class="dropdown">
                <button class="dropdown-toggle btn btn-primary shadow-md d-flex align-items-center" aria-expanded="false" data-bs-toggle="dropdown"> Save <i class="w-4 h-4 ms-2" data-feather="chevron-down"></i> </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="side-menu-light-post.html" class="dropdown-item"> <i data-feather="file-text" class="w-4 h-4 me-2"></i> As New Post </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="pos intro-y grid columns-12 gap-5 mt-5">
       
        <!-- BEGIN: Post Content -->
        <div class="intro-y g-col-12 g-col-lg-8">
            <input type="text" class="intro-y form-control py-3 px-4 box border-white dark-border-dark-3 pe-10 placeholder-theme-13" value="{{ isset($specificPost) ? $specificPost->title : '' }}" name="title" placeholder="Title">
            @error('title')
            <span style="color: red;">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="text" class="intro-y form-control py-3 mt-3 px-4 box border-white dark-border-dark-3 pe-10 placeholder-theme-13" name="company_type" value="{{ isset($specificPost) ? $specificPost->company_type : '' }}" placeholder="Company Type">
            @error('company_type')
            <span style="color: red;">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="post intro-y overflow-hidden box mt-5">
                
                <div class="post__content tab-content">
                    <div class="tab-pane p-5 fade show active" id="content" role="tabpanel" aria-labelledby="content-tab">
                        <div class="border border-gray-200 dark-border-dark-5 rounded-2 p-5">
                            <div class="fw-medium d-flex align-items-center border-bottom border-gray-200 dark-border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 me-2"></i> Text Content </div>
                            <div class="mt-5">
                                <textarea id="editor" name="ckeditor_details">
                                   {{ isset($specificPost) ? $specificPost->details : '' }} 
                                </textarea>
                            </div>
                        </div>
                        <div class="border border-gray-200 dark-border-dark-5 rounded-2 p-5 mt-5">
                            <div class="fw-medium d-flex align-items-center border-bottom border-gray-200 dark-border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 me-2"></i> Logo or Image </div>
                            <div class="mt-5">
                                
                                <div class="mt-3">
                                    <label class="form-label">Upload Company Logo</label>
                                    <div class="border-2 border-dashed dark-border-dark-5 rounded-2 pt-4">
                                        <div class="d-flex flex-wrap px-4">
                                            
                                            <div class="w-24 h-24 position-relative image-fit mb-5 me-5 cursor-pointer zoom-in">
                                                <img class="display rounded-2" alt="" src="{{ isset($specificPost) ? $specificPost->img_url : '' }}">
                                            </div>
                                            
                                        </div>
                                        <div class="px-4 pb-4 d-flex align-items-center cursor-pointer position-relative dark-text-gray-500">
                                            <i data-feather="image" class="w-4 h-4 me-2"></i> <span class="text-theme-1 dark-text-theme-10 me-1">Upload a file</span> or drag and drop 
                                            <input type="file" name="post_img" class="uploadImg w-full h-full top-0 start-0 position-absolute opacity-0">
                                            @error('post_img')
                                            <span style="color: red;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Post Content -->


        <!-- BEGIN: Post Info -->
        <div class="g-col-12 g-col-lg-4">
            <div class="intro-y box p-5">
               
                <div class="mt-3">
                    <label for="post-form-2" class="form-label">Post Date</label>
                    <input class="datepicker form-control" value="{{ isset($specificPost) ? $specificPost->post_date : '' }}" name="post_date" id="post-form-2" data-single-mode="true">
                    @error('post_date')
                    <span style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="mt-3">
                    <label for="post-form-2" class="form-label">Location</label>
                    <input class=" form-control" value="{{ isset($specificPost) ? $specificPost->location : '' }}" name="location" id="post-form-2" data-single-mode="true">
                    @error('location')
                    <span style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="post-form-2" class="form-label">Vacancy</label>
                    <input class=" form-control" name="vacancy" value="{{ isset($specificPost) ? $specificPost->vacancy : '' }}" id="post-form-2" data-single-mode="true">
                    @error('vacancy')
                    <span style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="post-form-2" class="form-label">Job nature</label>
                    <input class=" form-control" name="job_nature" value="{{ isset($specificPost) ? $specificPost->job_nature : '' }}" id="post-form-2" data-single-mode="true">
                    @error('job_nature')
                    <span style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="post-form-2" class="form-label">Salary</label>
                    <input class=" form-control" name="salary" value="{{ isset($specificPost) ? $specificPost->salary : '' }}" id="post-form-2" data-single-mode="true">
                    @error('salary')
                    <span style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="post-form-2" class="form-label">Application Date</label>
                    <input class="datepicker form-control" value="{{ isset($specificPost) ? $specificPost->application_date : '' }}" name="application_date" id="post-form-2" data-single-mode="true">
                    @error('application_date')
                    <span style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="post-form-3" class="form-label">Categories</label>
                    <select data-placeholder="Select categories" name="categori_job" class="tom-select w-full" id="post-form-3">                        
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" >{{ $category->title }}</option>  
                        @endforeach
                    </select>
                </div>
                
                <div class="mt-3">
                    <label for="post-form-2" class="form-label">Company Name</label>
                    <input class=" form-control" value="{{ isset($specificPost) ? $specificPost->company_name : '' }}" name="company_name" id="post-form-2" data-single-mode="true">
                    @error('company_name')
                    <span style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="post-form-2" class="form-label">Website</label>
                    <input class=" form-control" value="{{ isset($specificPost) ? $specificPost->website_url : '' }}" name="website_url" id="post-form-2" data-single-mode="true">
                   
                </div>

                <div class="mt-3">
                    <label for="post-form-2" class="form-label">Email</label>
                    <input class=" form-control" name="email" value="{{ isset($specificPost) ? $specificPost->email : '' }}" id="post-form-2" data-single-mode="true">
                    @error('email')
                    <span style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="post-form-2" class="form-label">Profile</label>
                    <input class=" form-control" value="{{ isset($specificPost) ? $specificPost->profile : '' }}" name="profile" id="post-form-2" data-single-mode="true">
                    @error('profile')
                    <span style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
        </div>
        <!-- END: Post Info -->
        
    </div>
    <button class="btn btn-primary w-full mt-3">{{ isset($specificPost) ? 'Update' : 'Submit' }} Post</button>

  </form>

</div>

@push('customs')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );
</script>
@endpush

@push('imgview')
<script>
    let uploadImg = document.querySelector('.uploadImg')
    let display = document.querySelector('.display')
    
    function imgPreviewer(event){
        let url = URL.createObjectURL(event.target.files[0])
        display.src = url
    }
    uploadImg.addEventListener('change',imgPreviewer);
</script>
@endpush

@endsection
