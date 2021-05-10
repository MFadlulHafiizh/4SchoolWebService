<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Home - 4School | CloverTech</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">

    <style>
        * {
            /* font-family: 'Montserrat', sans-serif; */
            font-family: 'Poppins', sans-serif;
        }
        .home {
            background-image: linear-gradient(80deg, #380356, #6b0078);
        }
        .jumbotron {
            margin-top: -60px;
            background: url("{{ asset('img/landing/02 putih.png') }}");
            background-size: cover;
            height: 665px;
            padding-top: 100px;
        }
        .btn-purple {
            background: linear-gradient(80deg, #93009c, #b000b2);
            border-radius: 100px;
            color: #f6f6f6;
            padding: 10px 15px;
        }
        .ourapp {
            padding-bottom: -100px;
        }
        .page {
            min-height: 725px;
        }
        .about, .footer {
            background-image: linear-gradient(80deg, #380356, #6b0078);
        }
        .card {
            border: none;
        }
        .ourapp, .about, .product, .contact {
            padding-top: 100px;
        }
        .home nav {
            position: fixed;
            top: 0;
            left: 0;
            width:100%;
            transition: 0.6s;
            z-index: 10000;
        }
        .color {
            /* background: linear-gradient(80deg, #380356, #6b0078); */
            background-color: #380356;
        }

    </style>
</head>

<body>

    <div class="home">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <img src="{{ asset('img/landing/logo-nav.png') }}" height="30px" alt="img-logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-link mr-4 active" aria-current="page" href="#">Home</a>
                        <a class="nav-link mr-4" href="#features">Features</a>
                        <a class="nav-link mr-4" href="#product">Product</a>
                        <a class="nav-link mr-4" href="#download">Download</a>
                        <a class="nav-link mr-4" href="#">About</a>
                        <a class="btn btn-md btn-purple" href="#contact">Contact Us</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Jumbotron -->
        <div class="jumbotron page jumbotron-fluid mb-0">
            <div class="container h-100 text-center text-light pt-5 mt-5">
                <h1 class="display-4 mt-3">Digital School</h1>
                <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia, magnam.</p>
            </div>
        </div>
        <!-- Jumbotron end -->
    </div>
    
    <!-- Our App -->
    <div class="ourapp page" id="features">
        <div class="container text-center">
            <div class="row mb-2">
                <div class="col">
                    <h2>Our Appliaction Features</h2>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, tempora?</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-body shadow">
                            <img src="{{ asset('img/landing/illlustration-product.svg') }}" class="px-3 pt-2 pb-4" width="200px">
                            <div class="text-start">
                                <h5 class="card-title">Maps</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate distinctio enim maiores. Rem, nisi natus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-body shadow">
                            <img src="{{ asset('img/landing/illlustration-product.svg') }}" class="px-3 pt-2 pb-4" width="200px">
                            <div class="text-start">
                                <h5 class="card-title">Task Management</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate distinctio enim maiores. Rem, nisi natus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-body shadow">
                            <img src="{{ asset('img/landing/illlustration-product.svg') }}" class="px-3 pt-2 pb-4" width="200px">
                            <div class="text-start">
                                <h5 class="card-title">Schedule</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate distinctio enim maiores. Rem, nisi natus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-body shadow">
                            <img src="{{ asset('img/landing/illlustration-product.svg') }}" class="px-3 pt-2 pb-4" width="200px">
                            <div class="text-start">
                                <h5 class="card-title">Online Raport</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate distinctio enim maiores. Rem, nisi natus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our App End -->

    <!-- Product -->
    <div class="product page" id="product">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <img src="{{ asset('img/landing/illustration-product-2.svg') }}" class="p-4" width="100%">
                </div>
                <div class="col-sm text-start mt-4">
                    <h2>Easy to use mobile <br> Application</h2>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati provident, officiis, deserunt, fugit odit culpa illum velit consectetur quibusdam debitis est? Asperiores numquam architecto vitae ipsa est eius excepturi! Ut iusto velit facere. Esse a enim, nemo optio dolores odit ex veritatis error saepe numquam tenetur exercitationem adipisci asperiores repellendus!</p>
                    <!-- <div class="info">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('img/landing/illustration-product-2.svg') }}" width="60px">
                            </div>
                            <div class="col-10">
                                <h5>Uploading & Downloading</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit aliquam inventore sapiente saepe deleniti?</p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->

    <!-- Screenshoot -->
    <div class="about page text-light" id="download">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>Download Our Apps</h2>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, dignissimos aliquam vel sunt veniam quo!</p>
                    <a href="#" class="btn btn-lg btn-purple">Download</a>
                </div>
            </div>
            <div class="row">
                <div class="col text-center mt-4">
                    <img src="{{ asset('img/landing/illlustration-product.svg') }}" class="img-fluid" width="500px">
                </div>
            </div>
        </div>
    </div>
    <!-- Screenshoot End -->


    <!-- Contact Us -->
    <div class="contact page" id="contact" style="background: url('{{ asset('img/landing/06 biru.png') }}'); background-size:cover;">
        <div class="container">
            <div class="row mb-3">
                <div class="col text-center">
                    <h2>Contact Us</h2>
                </div>
            </div>
            <div class="row">
            <form>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Message</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-purple w-100 mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Contact Us End -->

    <!-- Footer -->
    <div class="footer text-light">
        
        <div class="container">
            <div class="row text-center py-2">
                <div class="col">
                    <p class="mt-3">© Copyright Digitzation 2021</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="{{asset('assets/js/stisla.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>

    <script>
        $(window).on('scroll', function(){
            if($(window).scrollTop()) {
                $('nav').addClass('color');
            } else {
                $('nav').removeClass('color');
            }
        });
    </script>
</body>
</html>
