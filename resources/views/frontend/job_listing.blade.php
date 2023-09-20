@extends('frontend.homePage')

@section('frontendContent')
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
            data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            
                                
                            <h2>{{ $categori->title }}</h2>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="job-listing-area pt-120 pb-120">
        <div class="container">
            <div class="row">


                <div class="col-xl-12 col-lg-12 col-md-8">

                    <section class="featured-job-area">
                        <div class="container">


                            @foreach ($specificPost as $post)
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img style="width: 100px;height:100px;"
                                                src="{{ $post->img_url }}"
                                                alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>{{ $post->title }}</h4>
                                        </a>
                                        <ul>
                                            <li>{{ $post->company_type }}</li>
                                            <li><i class="fas fa-map-marker-alt"></i>{{ $post->location }}</li>
                                            <li>${{ $post->salary }}</li>
                                        </ul>
                                    </div>
                                   
                                    

                                </div>

                                <div>
                                    <a href="{{ route('home.jobapply',$post->slug) }}" class="btn">Apply Now</a>
                                </div>

                                <div class="items-link items-link2 f-right">
                                    <a href="#">{{ $post->job_nature }}</a>
                                    <span>{{ $post->post_date }}</span>
                                    
                                </div>
                            </div>
                            @endforeach

                            

                    </section>

                </div>
            </div>
        </div>
    </div>

{{-- 
    <div class="pagination-area pb-115 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item active"><a class="page-link" href="job_listing.html#">01</a></li>
                                <li class="page-item"><a class="page-link" href="job_listing.html#">02</a></li>
                                <li class="page-item"><a class="page-link" href="job_listing.html#">03</a></li>
                                <li class="page-item"><a class="page-link" href="job_listing.html#"><span
                                            class="ti-angle-right"></span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@endsection
