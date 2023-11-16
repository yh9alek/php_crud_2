<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PHP CRUD 2</title>
        <link rel="stylesheet" href="../css/app.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid container">
            <h1 class="titulo">PHP CRUD 2</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Acciones
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#">Página Principal</a></li>
                            <li><a class="dropdown-item" href="#">Añadir Producto</a></li>
                            <li><a class="dropdown-item" href="#">Editar Producto</a></li>
                            <li><a class="dropdown-item" href="#">Eliminar Producto</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="products-section">
        <div class="products-content container">
            <div class="swiper products-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card" style="width: 18rem;">
                            <img src="https://cdn.discordapp.com/attachments/1129195909796860029/1167308512024608879/watch.jpg?ex=65601cc4&is=654da7c4&hm=ab6fb7bfa30cf181844979eab6eabfd7890c3571d7f57e571cb48eef162b628e&" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Description of the product.</p>
                                <div class="price-container">
                                    <a href="#" class="btn btn-primary">Comprar</a>
                                    <h4>$15000</h4>
                                </div>
                                <div class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card" style="width: 18rem;">
                            <img src="https://cdn.discordapp.com/attachments/1129195909796860029/1167308512024608879/watch.jpg?ex=65601cc4&is=654da7c4&hm=ab6fb7bfa30cf181844979eab6eabfd7890c3571d7f57e571cb48eef162b628e&" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Description of the product.</p>
                                <div class="price-container">
                                    <a href="#" class="btn btn-primary">Comprar</a>
                                    <h4>$15000</h4>
                                </div>
                                <div class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card" style="width: 18rem;">
                            <img src="https://cdn.discordapp.com/attachments/1129195909796860029/1167308512024608879/watch.jpg?ex=65601cc4&is=654da7c4&hm=ab6fb7bfa30cf181844979eab6eabfd7890c3571d7f57e571cb48eef162b628e&" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Description of the product.</p>
                                <div class="price-container">
                                    <a href="#" class="btn btn-primary">Comprar</a>
                                    <h4>$15000</h4>
                                </div>
                                <div class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card" style="width: 18rem;">
                            <img src="https://cdn.discordapp.com/attachments/1129195909796860029/1167308512024608879/watch.jpg?ex=65601cc4&is=654da7c4&hm=ab6fb7bfa30cf181844979eab6eabfd7890c3571d7f57e571cb48eef162b628e&" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Description of the product.</p>
                                <div class="price-container">
                                    <a href="#" class="btn btn-primary">Comprar</a>
                                    <h4>$15000</h4>
                                </div>
                                <div class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card" style="width: 18rem;">
                            <img src="https://cdn.discordapp.com/attachments/1129195909796860029/1167308512024608879/watch.jpg?ex=65601cc4&is=654da7c4&hm=ab6fb7bfa30cf181844979eab6eabfd7890c3571d7f57e571cb48eef162b628e&" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Description of the product.</p>
                                <div class="price-container">
                                    <a href="#" class="btn btn-primary">Comprar</a>
                                    <h4>$15000</h4>
                                </div>
                                <div class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
    <footer style="text-align: center;">
        <div class="container">
            <h4>Copyright 2023 @ Yohan Alek Plazola Arangure</h4>
        </div>
    </footer>
    <!-- Swiper JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Font Awesome Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/swiper.js"></script>
    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>