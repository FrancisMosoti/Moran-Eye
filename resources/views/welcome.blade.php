@extends('layouts.master')
@section('content')


<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('img/carousel-1.jpg') }}" alt="Image">
                <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center carousel-content-bg">
                    <div class="text-start p-5" style="max-width: 900px;">
                        <h3 class="text-white">Ranch Management System</h3>
                        <h1 class="display-1 text-white mb-md-4">Optimize Your Ranch Operations</h1>
                        @auth
    @if(Auth::user()->role === 'admin')
        <a href="{{ route('dashboard') }}" class="btn btn-primary py-md-3 px-md-5 me-3">Admin Dashboard</a>
    @elseif(Auth::user()->role === 'farmer')
        <a href="{{ route('customerdashboard') }}" class="btn btn-primary py-md-3 px-md-5 me-3">Farmer Dashboard</a>
    @elseif(Auth::user()->role === 'veterinary')
        <a href="{{ route('vetdashboard') }}" class="btn btn-primary py-md-3 px-md-5 me-3">Veterinary Dashboard</a>
    @elseif(Auth::user()->role === 'company_worker')
        <a href="{{ route('company_worker') }}" class="btn btn-primary py-md-3 px-md-5 me-3">Company Worker Dashboard</a>
    @else
        <a href="{{ route('userdashboard') }}" class="btn btn-primary py-md-3 px-md-5 me-3">User Dashboard</a>
    @endif
    <a href="#" class="btn btn-secondary py-md-3 px-md-5">Visit Blog</a>
@endauth

@guest
    <a href="{{ route('login') }}" class="btn btn-primary py-md-3 px-md-5 me-3">Login</a>
    <a href="{{ route('register') }}" class="btn btn-secondary py-md-3 px-md-5">Signup</a>
@endguest

                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('img/carousel-2.jpg') }}" alt="Image">
                <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center carousel-content-bg">
                    <div class="text-start p-5" style="max-width: 900px;">
                        <h3 class="text-white">Veterinary Services</h3>
                        <h1 class="display-1 text-white mb-md-4">Ensure Healthy and Productive Livestock</h1>
                        
                        @auth
    @if(Auth::user()->role === 'admin')
        <a href="{{ route('dashboard') }}" class="btn btn-primary py-md-3 px-md-5 me-3">Admin Dashboard</a>
    @elseif(Auth::user()->role === 'farmer')
        <a href="{{ route('customerdashboard') }}" class="btn btn-primary py-md-3 px-md-5 me-3">Farmer Dashboard</a>
    @elseif(Auth::user()->role === 'veterinary')
        <a href="{{ route('vetdashboard') }}" class="btn btn-primary py-md-3 px-md-5 me-3">Veterinary Dashboard</a>
    @elseif(Auth::user()->role === 'company_worker')
        <a href="{{ route('company_worker') }}" class="btn btn-primary py-md-3 px-md-5 me-3">Company Worker Dashboard</a>
    @else
        <a href="{{ route('userdashboard') }}" class="btn btn-primary py-md-3 px-md-5 me-3">User Dashboard</a>
    @endif
    <a href="#" class="btn btn-secondary py-md-3 px-md-5">Visit Blog</a>
@endauth

@guest
    <a href="{{ route('login') }}" class="btn btn-primary py-md-3 px-md-5 me-3">Login</a>
    <a href="{{ route('register') }}" class="btn btn-secondary py-md-3 px-md-5">Signup</a>
@endguest

                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- Carousel End -->


<!-- Banner Start -->
<div class="container-fluid banner mb-5">
    <div class="container">
        <div class="row gx-0">
            <div class="col-md-6">
                <div class="bg-primary bg-vegetable d-flex flex-column justify-content-center p-5"
                    style="height: 300px;">
                    <h3 class="text-dark mb-3">Comprehensive Ranch Solutions</h3>
                    <p class="text-dark">Streamline your ranch management with our all-in-one platform.</p>
                    <a class="text-dark fw-bold" href="">Read More<i class="bi bi-arrow-right ms-2"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-secondary bg-fruit d-flex flex-column justify-content-center p-5" style="height: 300px;">
                    <h3 class="text-white mb-3">Veterinary Care</h3>
                    <p class="text-white">Providing top-notch veterinary services to maintain livestock health.</p>
                    <a class="text-white fw-bold" href="">Read More<i class="bi bi-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Start -->


<!-- About Start -->
<div class="container-fluid about pt-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="d-flex h-100 border border-5 border-primary border-bottom-0 pt-4">
                    <img class="img-fluid mt-auto mx-auto" src="{{asset('img/about-3.png')}}">
                </div>
            </div>
            <div class="col-lg-6 pb-5">
                <div class="mb-3 pb-2">
                    <h6 class="text-primary text-uppercase">About Us</h6>
                    <h1 class="display-5">Your Trusted Partner in Ranch Management</h1>
                </div>
                <p class="mb-4">We offer innovative solutions for ranch management, focusing on efficiency, productivity, and livestock health.</p>
                <div class="row gx-5 gy-4">
                    <div class="col-sm-6">
                        <i class="fa fa-seedling display-1 text-secondary"></i>
                        <h4>Innovative Solutions</h4>
                        <p class="mb-0">Advanced digital tools to improve ranch operations and livestock management.</p>
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-award display-1 text-secondary"></i>
                        <h4>Veterinary Expertise</h4>
                        <p class="mb-0">Experienced veterinarians dedicated to keeping your livestock healthy.</p>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Facts Start -->
<div class="container-fluid bg-primary facts py-5 mb-5">
    <div class="container py-5">
        <div class="row gx-5 gy-4">
            <div class="col-lg-3 col-md-6">
                <div class="d-flex">
                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3"
                        style="width: 60px; height: 60px;">
                        <i class="fa fa-cow fs-4 text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-white">Years of Expertise</h5>
                        <h1 class="display-5 text-white mb-0" data-toggle="counter-up">25</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex">
                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3"
                        style="width: 60px; height: 60px;">
                        <i class="fa fa-tractor fs-4 text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-white">Skilled Ranchers</h5>
                        <h1 class="display-5 text-white mb-0" data-toggle="counter-up">40</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex">
                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3"
                        style="width: 60px; height: 60px;">
                        <i class="fa fa-barn fs-4 text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-white">Managed Acres</h5>
                        <h1 class="display-5 text-white mb-0" data-toggle="counter-up">5000</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex">
                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3"
                        style="width: 60px; height: 60px;">
                        <i class="fa fa-smile fs-4 text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-white">Satisfied Ranch Owners</h5>
                        <h1 class="display-5 text-white mb-0" data-toggle="counter-up">1000+</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Facts End -->


<!-- Services Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <div class="mb-3">
                    <h6 class="text-primary text-uppercase">Services</h6>
                    <h1 class="display-5">Moran Eye LTD</h1>
                </div>
                <p class="mb-4">We offer comprehensive ranch management services tailored to meet the unique needs of your ranch. From livestock care to pasture management, we've got you covered.</p>
                <a href="" class="btn btn-primary py-md-3 px-md-5">Contact Us</a>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item bg-light text-center p-5">
                    <i class="fa-solid fa-cow display-1 text-primary mb-3"></i>
                    <h4>Livestock Management</h4>
                    <p class="mb-0">Ensuring the health and well-being of your cattle with expert care and attention.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item bg-light text-center p-5">
                    <i class="fa fa-leaf display-1 text-primary mb-3"></i>
                    <h4>Pasture Management</h4>
                    <p class="mb-0">Optimizing your pasture's productivity through sustainable grazing practices.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item bg-light text-center p-5">
                    <i class="fa fa-barn display-1 text-primary mb-3"></i>
                    <h4>Ranch Infrastructure</h4>
                    <p class="mb-0">Building and maintaining essential ranch infrastructure for efficient operations.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item bg-light text-center p-5">
                    <i class="fa fa-tractor display-1 text-primary mb-3"></i>
                    <h4>Modern Equipment</h4>
                    <p class="mb-0">Providing access to modern equipment and machinery for all ranching needs.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item bg-light text-center p-5">
                    <i class="fa fa-seedling display-1 text-primary mb-3"></i>
                    <h4>Sustainable Practices</h4>
                    <p class="mb-0">Implementing sustainable practices to ensure the long-term health of your ranch.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Services End -->


<!-- Features Start -->







<!-- Testimonial Start -->
<div class="container-fluid bg-testimonial py-5 my-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="owl-carousel testimonial-carousel p-5">
                    <div class="testimonial-item text-center text-dark">
                        <img class="img-fluid mx-auto p-2 border border-5 border-secondary rounded-circle mb-4"
                            src="{{asset('img/testimonial-1.jpg')}}" alt="">
                        <p class="fs-5">"The quality of the grass-fed beef from this ranch is unparalleled. Every cut is tender and full of flavor. We also love their organic dairy products. Highly recommended!"</p>
                        <hr class="mx-auto w-25">
                        <h4 class="text-dark mb-0">John Doe</h4>
                    </div>
                    <div class="testimonial-item text-center text-dark">
                        <img class="img-fluid mx-auto p-2 border border-5 border-secondary rounded-circle mb-4"
                            src="{{asset('img/testimonial-2.jpg')}}" alt="">
                        <p class="fs-5">"This ranch is our go-to for premium leather and wool products. The craftsmanship is exceptional, and you can tell they truly care about their animals and the environment."</p>
                        <hr class="mx-auto w-25">
                        <h4 class="text-dark mb-0">Jane Smith</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial End -->


<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="mx-auto text-center mb-5" style="max-width: 500px;">
            <h6 class="text-primary text-uppercase">The Team</h6>
            <h1 class="display-5">Meet Our Professional Ranch Management Team</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <div class="row g-0">
                    <div class="col-10">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{asset('img/team-1.jpg')}}" alt="">
                            <div class="position-absolute start-0 bottom-0 w-100 py-3 px-4"
                                style="background: rgba(0, 51, 102, 0.85);">
                                <h4 class="text-white">John Doe</h4>
                                <span class="text-white">Lead Rancher</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div
                            class="h-100 d-flex flex-column align-items-center justify-content-around bg-secondary py-5">
                            <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                    class="fab fa-twitter text-secondary"></i></a>
                            <a class="btn btn-square rounded-circle bg-white"
                                href="#"><i
                                    class="fab fa-facebook-f text-secondary"></i></a>
                            <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                    class="fab fa-linkedin-in text-secondary"></i></a>
                            <a class="btn btn-square rounded-circle bg-white"
                                href="#"><i
                                    class="fab fa-youtube text-secondary"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="row g-0">
                    <div class="col-10">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{asset('img/team-2.jpg')}}" alt="">
                            <div class="position-absolute start-0 bottom-0 w-100 py-3 px-4"
                                style="background: rgba(0, 51, 102, 0.85);">
                                <h4 class="text-white">Jane Smith</h4>
                                <span class="text-white">Veterinarian</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div
                            class="h-100 d-flex flex-column align-items-center justify-content-around bg-secondary py-5">
                            <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                    class="fab fa-twitter text-secondary"></i></a>
                            <a class="btn btn-square rounded-circle bg-white"
                                href="#"><i
                                    class="fab fa-facebook-f text-secondary"></i></a>
                            <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                    class="fab fa-linkedin-in text-secondary"></i></a>
                            <a class="btn btn-square rounded-circle bg-white"
                                href="#"><i
                                    class="fab fa-youtube text-secondary"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="row g-0">
                    <div class="col-10">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{asset('img/team-3.jpg')}}" alt="">
                            <div class="position-absolute start-0 bottom-0 w-100 py-3 px-4"
                                style="background: rgba(0, 51, 102, 0.85);">
                                <h4 class="text-white">Michael Lee</h4>
                                <span class="text-white">Farm Operations Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div
                            class="h-100 d-flex flex-column align-items-center justify-content-around bg-secondary py-5">
                            <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                    class="fab fa-twitter text-secondary"></i></a>
                            <a class="btn btn-square rounded-circle bg-white"
                                href="#"><i
                                    class="fab fa-facebook-f text-secondary"></i></a>
                            <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                    class="fab fa-linkedin-in text-secondary"></i></a>
                            <a class="btn btn-square rounded-circle bg-white"
                                href="#"><i
                                    class="fab fa-youtube text-secondary"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Team End -->


<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="mx-auto text-center mb-5" style="max-width: 500px;">
            <h6 class="text-primary text-uppercase">Ranch Blog</h6>
            <h1 class="display-5">Latest Insights From Our Ranch Management Experts</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="blog-item position-relative overflow-hidden">
                    <img class="img-fluid" src="{{asset('img/blog-1.jpg')}}" alt="">
                    <a class="blog-overlay" href="">
                        <h4 class="text-dark">Maximizing Cattle Health: Best Practices for 2024</h4>
                        <span class="text-dark fw-bold">Jan 01, 2050</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item position-relative overflow-hidden">
                    <img class="img-fluid" src="{{asset('img/blog-2.jpg')}}" alt="">
                    <a class="blog-overlay" href="">
                        <h4 class="text-dark">Sustainable Grazing: Techniques to Improve Pasture</h4>
                        <span class="text-dark fw-bold">Jan 01, 2050</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item position-relative overflow-hidden">
                    <img class="img-fluid" src="{{asset('img/blog-3.jpg')}}" alt="">
                    <a class="blog-overlay" href="">
                        <h4 class="text-dark">Ranch Management Software: Streamlining Operations</h4>
                        <span class="text-dark fw-bold">Jan 01, 2050</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection