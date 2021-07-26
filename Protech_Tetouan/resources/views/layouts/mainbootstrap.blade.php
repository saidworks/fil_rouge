<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Esthétique Auto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!-- Start Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital@1&display=swap" rel="stylesheet">
    <!-- End Google fonts -->

    <link rel="stylesheet" href="{{ asset('css/mainBootstrap.css')}}">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Start Nav -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="./index.html"><img src="./images/logo.png" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="mx-auto navbar-nav">
            <li class="px-4 nav-item"><a class="nav-link" href="./about.html">Qui Sommes Nous?</a></li>
            <li class="px-4 nav-item"><a class="nav-link" href="./services.html">Nos Services</a></li>
            <li class="px-4 nav-item"><a class="nav-link" href="./products.html">Nos Produits</a></li>
            <li class="px-4 nav-item"><a class="nav-link" href="./references.html">Nos Références</a></li>
            <li class="px-4 nav-item"><a class="nav-link" href="./contact.html">Contact</a></li>
          </ul>
        </div>
    </nav>
    <!-- End Nav -->

    <!-- Start Page -->
    <div class="container mt-4 body">

        <!-- Start Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active"><img class="d-block w-100" src="./img/car01.jpeg" alt="First slide"></div>
                <div class="carousel-item"><img class="d-block w-100" src="./img/car02.jpeg" alt="Second slide"></div>
                <div class="carousel-item"><img class="d-block w-100" src="./img/car03.jpeg" alt="Third slide"></div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- End Carousel -->

        <!-- Start Grid -->
        <div class="container mt-4">
            <div class="h3 d-flex justify-content-center">Nos Services</div>
            <div class="row">
                <div class="col">
                    <div class="mx-auto mt-4 card" style="width: 24rem;">
                        <img class="card-img-top" src="./images/car01.jpeg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mx-auto mt-4 card" style="width: 24rem;">
                        <img class="card-img-top" src="./images/car01.jpeg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mx-auto mt-4 card" style="width: 24rem;">
                        <img class="card-img-top" src="./images/car01.jpeg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mx-auto mt-4 card" style="width: 24rem;">
                        <img class="card-img-top" src="./images/car01.jpeg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Grid -->

    </div>
    <!-- End Page -->

    <!-- Start Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col footer-first">
                    <img class="footer-logo" src="./images/logo.png" />
                    <div>
                        <div>phone: </div>
                        <div>email: </div>
                        <div>address: </div>
                    </div>
                </div>
                <div class="col footer-second">
                    <div>Rejoignez nous sur:</div>
                    <div class="social-footer">
                        <a href="https://www.facebook.com/Protech2018/" target="_blank" >
                            <img class="social-logo" src="./images/fb-logo.png"/>
                        </a>
                        <a href="https://www.instagram.com/protech_tetouan/" target="_blank" >
                            <img class="social-logo" src="./images/ig-logo.png"/>
                        </a>
                    </div>
                </div>
                <div class="col footer-third">
                    <div>Esthétique Auto Tetouan 2021 votre une entreprise avec des services...</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

</body>
</html>
