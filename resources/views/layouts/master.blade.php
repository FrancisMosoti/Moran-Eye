<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Moran Eye LTD</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description"> -->

    <!-- Favicon -->
    <link href="{{secure_asset('images/LOGO.jpg')}}" rel="icon">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{secure_asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{secure_asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{secure_asset('css/style.css')}}" rel="stylesheet">

</head>

<body>
    <header>
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5">
            <a href="index.html" class="navbar-brand d-flex d-lg-none">
                <h1 class="m-0 display-4 text-secondary"><span class="text-dark">Moran</span>Eye</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="#" class="nav-item nav-link active">Home</a>
                    <a href="#" class="nav-item nav-link">About</a>
                    <a href="#" class="nav-item nav-link">Service</a>
                    <a href="#" class="nav-item nav-link">Product</a>
                    <a href="#" class="nav-item nav-link">Blog</a>
                    <a href="#" class="nav-item nav-link">Contact</a>
                </div>
            </div>
        </nav>
        @yield('content')

        <!-- Footer Start -->
        <div class="container-fluid bg-footer bg-primary text-dark mt-5">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-8 col-md-6">
                        <div class="row gx-5">
                            <div class="col-lg-4 col-md-12 pt-5 mb-5">
                                <h4 class="text-dark mb-4">Get In Touch</h4>
                                <div class="d-flex mb-2">
                                    <i class="bi bi-geo-alt text-dark me-2"></i>
                                    <p class="text-dark mb-0">Moran Eye LTD, City, Country</p>
                                </div>
                                <div class="d-flex mb-2">
                                    <i class="bi bi-envelope-open text-dark me-2"></i>
                                    <p class="text-dark mb-0">info@moraneeye.com</p>
                                </div>
                                <div class="d-flex mb-2">
                                    <i class="bi bi-telephone text-dark me-2"></i>
                                    <p class="text-dark mb-0">+012 345 67890</p>
                                </div>
                                <div class="d-flex mt-4">
                                    <a class="btn btn-secondary btn-square rounded-circle me-2"
                                        href="https://twitter.com/moraneye"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-secondary btn-square rounded-circle me-2"
                                        href="https://facebook.com/moraneye"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-secondary btn-square rounded-circle me-2"
                                        href="https://linkedin.com/company/moraneye"><i
                                            class="fab fa-linkedin-in"></i></a>
                                    <a class="btn btn-secondary btn-square rounded-circle"
                                        href="https://youtube.com/moraneye"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                                <h4 class="text-dark mb-4">Quick Links</h4>
                                <div class="d-flex flex-column justify-content-start">
                                    <a class="text-dark mb-2" href="#"><i
                                            class="bi bi-arrow-right text-dark me-2"></i>Home</a>
                                    <a class="text-dark mb-2" href="#"><i
                                            class="bi bi-arrow-right text-dark me-2"></i>About Us</a>
                                    <a class="text-dark mb-2" href="#"><i
                                            class="bi bi-arrow-right text-dark me-2"></i>Our Services</a>
                                    <a class="text-dark mb-2" href="#"><i
                                            class="bi bi-arrow-right text-dark me-2"></i>Meet The Team</a>
                                    <a class="text-dark mb-2" href="#"><i
                                            class="bi bi-arrow-right text-dark me-2"></i>Our Ranches</a>
                                    <a class="text-dark" href="#"><i
                                            class="bi bi-arrow-right text-dark me-2"></i>Contact Us</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                                <h4 class="text-dark mb-4">Popular Links</h4>
                                <div class="d-flex flex-column justify-content-start">
                                    <a class="text-dark mb-2" href="#"><i
                                            class="bi bi-arrow-right text-dark me-2"></i>Home</a>
                                    <a class="text-dark mb-2" href="#"><i
                                            class="bi bi-arrow-right text-dark me-2"></i>About Us</a>
                                    <a class="text-dark mb-2" href="#"><i
                                            class="bi bi-arrow-right text-dark me-2"></i>Our Services</a>
                                    <a class="text-dark mb-2" href="#"><i
                                            class="bi bi-arrow-right text-dark me-2"></i>Meet The Team</a>
                                    <a class="text-dark mb-2" href="#"><i
                                            class="bi bi-arrow-right text-dark me-2"></i>Our Ranches</a>
                                    <a class="text-dark" href="#"><i
                                            class="bi bi-arrow-right text-dark me-2"></i>Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-n5 text-white">
                        <div
                            class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-secondary p-5">
                            <h4 class="text-white">Newsletter</h4>
                            <h6 class="text-white">Stay Updated with Moran Eye LTD</h6>
                            <p>Get the latest updates on our ranch management services and more.</p>
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-secondary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script src="{{secure_asset('lib/easing/easing.min.js')}}"></script>
        <script src="{{secure_asset('lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{secure_asset('lib/counterup/counterup.min.js')}}"></script>
        <script src="{{secure_asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

        <!-- Template Javascript -->
        <script src="{{secure_asset('js/main.js')}}"></script>

        <script src="{{secure_asset('js/script.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>