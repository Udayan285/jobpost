@extends('frontend.homePage')

@section('frontendContent')
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                @foreach ($specificPostone as $post)
                                    
                                <h2> {{ $post->title }}</h2>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <h2 class="contact-title">Fillup all filled for apply</h2>
            </div>
            <div class="col-lg-8">
                
            <form action="{{ route('home.submitapply') }}" method="POST" enctype="multipart/form-data">
                <div class="row ">
                        @csrf

                         {{-- djfhdsjfhd --}}
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Enter Name">
                                @error('name')
                                <span style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="Phone" id="Phone" type="text" placeholder="Enter Phone">
                                @error('Phone')
                                <span style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Enter email">
                                @error('email')
                                <span style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="Address" id="Address" type="text" placeholder="Enter Address">
                                @error('Address')
                                <span style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="Experience" id="Experience" type="text" placeholder="Enter Experience">
                                @error('Experience')
                                <span style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="Expected_salary" id="Expected salary" type="text" placeholder="Expected salary">
                                @error('Expected_salary')
                                <span style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- hidden input for job title --}}
                        <div class="col-12">
                            <div class="form-group">
                                <input value="{{ $post->title }}" name="job_title" id="job_title" type="hidden" >
                            </div>
                        </div>
                        {{-- hidden input for job title --}}


                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Write Your Short CV"></textarea>
                                @error('message')
                                <span style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="" >Your Picture</label>
                                <input class="form-control uploadImg" name="applicant_img" id="Applicant_img" type="file">
                                @error('applicant_img')
                                <span style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                         <div class="col-12 ">
                                <div class="">
                                    <img class="display" style="width: 200px; height:200px" src="" alt="">
                                </div>
                         </div>

                    
                        <div class="form-group mt-3">
                            <button class="button mt-3 button-contactForm boxed-btn">Send</button>
                        </div>
        
                    </div>
                </form>
            </div>


            <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>{{ $post->company_name }}</h3>
                        <p>{{ $post->location }}</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>Company Email</h3>
                        <p>{{ $post->email }}</p>
                    </div>
                </div>

                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Job posting Date</h3>
                        <p>{{ $post->post_date }}</p>
                    </div>
                </div>

                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Last Date for Apply</h3>
                        <p>{{ $post->application_date }}</p>
                    </div>
                </div>

                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Salary</h3>
                        <p>{{ $post->salary }}</p>
                    </div>
                </div>

                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Vacancy</h3>
                        <p>{{ $post->vacancy }}</p>
                    </div>
                </div>

                <div class="media contact-info">
                    
                    <div class="media-body">
                        
                        <img src="{{ $post->img_url }}" alt="">
                    </div>
                </div>
               
            </div>
            
        </div>
    </div>
   

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