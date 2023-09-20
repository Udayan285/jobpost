@extends('frontend.homePage')

@section('frontendContent')
    <div class="slider-area ">

        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-10">
                            <div class="hero__caption">

                                @foreach ($banner_moto as $banner)
                                    <h1>{{ $banner->title }}</h1>
                                @endforeach



                            </div>
                        </div>
                    </div>

                    {{-- searching --}}
                    {{-- <div class="row">
                        <div class="col-xl-8">

                            <form action="#" class="search-box">
                                <div class="input-form">
                                    <input type="text" placeholder="Job Tittle or keyword">
                                </div>
                              
                             
                                    <button class="btn">Find job</button>
                                
                            </form>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>


    <div class="our-services section-pad-t30">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>FEATURED TOURS Packages</span>
                        <h2>Browse Categories </h2>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-contnet-center ">


                @foreach ($categoriess as $category)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-report"></span>
                            </div>
                            <div class="services-cap">
                                <h5><a href="{{ route('home.joblist', $category->id) }}">{{ $category->title }}</a></h5>
                                <span>(658)</span>
                            </div>
                        </div>
                    </div>
                @endforeach






            </div>
        </div>


        


        <section class="featured-job-area feature-padding">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>Recent Job</span>
                            <h2>Featured Jobs</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10">

                      @foreach ($jobs as $job)
                        
                   
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="#"><img
                                            src={{ $job->img_url }} style="height:100px;width:120px;" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="{{  route('home.jobapply',$job->slug)  }}">
                                        <h4>{{ $job->title }}</h4>
                                    </a>
                                    <ul>
                                        <li>{{ $job->company_type }}</li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{ $job->location }}</li>
                                        <li>{{ $job->salary }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="items-link f-right">
                                <a href="job_details.html">{{ $job->job_nature }}</a>
                                <span>{{ $job->post_date }}</span>
                            </div>
                        </div>
                        @endforeach
                      

                    </div>
                </div>
            </div>
        </section>





        <div class="support-company-area support-padding fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="right-caption">

                            <div class="section-tittle section-tittle2">
                                <span>{{ $user->email }}</span>
                                <h2>{{ $user->designation }}</h2>
                            </div>
                            <div class="support-caption">
                                <p class="pera-top">
                                  {!! $user->description !!}
                                </p>
                                    
                                <a href="{{ route('login') }}" class="btn post-btn">Post a job</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="support-location-img">
                            <img src={{ $user->profile_url }} alt="">
                            <div class="support-img-cap text-center">
                                
                                <span>{{$user->name}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="home-blog-area blog-h-padding">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>Our Employee</span>
                            <h2>Who are work with us</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach ($alluser as $selectUser)          
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="home-blog-single mb-30">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img src={{ $selectUser->profile_url ? $selectUser->profile_url : "https://api.dicebear.com/7.x/initials/svg?seed=".str($selectUser->name)->headline()  }} style="width:450px; height:400px;" alt="">

                                    <div class="blog-date text-center">
                                        <span>24</span>
                                        <p>Now</p>
                                    </div>
                                </div>
                                <div class="blog-cap">
                                    <p>{{ $selectUser->designation }}</p>
                                    <h3><a href="#">{{ $selectUser->name }}</a>
                                        <p>{!! $selectUser->description !!}</p>
                                    </h3>
                                    <a href="#" class="more-btn">Read more »</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                  
                </div>
            </div>
        </div>
    @endsection
