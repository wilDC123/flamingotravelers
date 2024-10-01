<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FlamingoTravels</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

        <!-- Styles -->
        <style>
          .navbar-nav a{
            font-size: 20px;
            font-weight: 600;
          }
            /* Ajuste del tamaño del carrusel */
            .carousel-item {
              height: 36rem; /* El 60% de la altura del viewport */
            }

            /* Asegurarse de que la imagen ocupe toda la pantalla */
            .carousel-item img {
              object-fit: cover; /* Mantiene el aspecto pero recorta si es necesario */
              width: 100%; /* Ancho completo */
              height: 100%; /* Altura ajustada al 60% del viewport */
            }

            /* Oscurecer la imagen con un overlay */
            .carousel-item::before {
              content: '';
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              background-color: rgba(0, 0, 0, 0.5); /* Oscurecer la imagen */
              z-index: 1; /* Asegura que el overlay esté sobre la imagen pero debajo del contenido */
            }

            /* Centrar la descripción y el botón */
            .carousel-caption {
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%); /* Centramos horizontal y verticalmente */
              z-index: 2; /* Asegura que el texto esté por encima del overlay */
            }

            /* Ajustar la visibilidad del texto */
            .carousel-caption h5 {
              color: white;
              font-size: 2.4rem; /* Ajustar el tamaño del texto */
              margin-bottom: 4rem
            }

            /* Personalización del botón de WhatsApp */
            .carousel-caption .btn-success {
              font-size: 1.4rem; /* Ajustar el tamaño del botón */
              font-weight: 700;
              border-radius: .8rem;
            }
            .section{
                width: 100vw;
                background: #e5e5e5;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 3rem 6rem 2rem;
            }
            .title{
                font-size: 40px;
                font-weight: 800;
                margin-bottom: 1.5rem;
            }
            .description{
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .description p{
                width: 90%;
                background: white;
                border-radius: 1rem;
                font-size: 22px;
                font-weight: 500;
                padding: 2rem 3rem;
            }
            .packages-container{
              display: flex;
              justify-content: center;
              flex-wrap: wrap;
              gap: 2rem;
            }
            .tour-card{
              display: flex;
              flex-direction: column;
              align-items: center;
              background: white;
              width: 24rem;
              border-radius: .8rem;
              box-shadow: 5px 5px 10px rgba(0,0,0,0.7);
              padding: 1rem;
            }
            .tour-card img{
              width: 100%;
              height: 14rem;
              object-fit: cover;
              border-radius: .8rem;
              margin-bottom: 1rem;
            }
            .tour-card h4{
              font-size: 26px;
              font-weight: 700;
            }
            .tour-card p{
              font-size: 20px;
              font-weight: 400;
            }
            .tour-card a{
              font-size: 20px;
              font-weight: 700;
              margin-bottom: .5rem;
            }
            .custom-carousel .carousel-item{
              width: 70vw;
              height: 35rem;
              margin-bottom: 6rem;
              box-shadow: 5px 5px 10px rgba(0,0,0,0.7);

            }
            .custom-carousel .carousel-caption h2 {
              font-size: 2.2rem;
              font-weight: bold;
              margin-bottom: 4rem;
            }
            .custom-carousel .carousel-caption a{
              font-size: 1.4rem;
              font-weight: bold;
              border-radius: .8rem;
            }
            .custom-carousel .carousel-caption a:hover {
              background-color: #e0e0e0;
            }
            .social-icons p{
              font-size: 1.2rem;
              font-weight: bold;
            }
          </style>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                  <!-- Ícono a la izquierda -->
                  <a class="navbar-brand" href="/">
                    <img src="{{ asset('img/flamingo_logo.png') }}" alt="Logo" style="width: 60px;">
                  </a>

                  <!-- Botón de colapso para móviles -->
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <!-- Contenido del navbar -->
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Menú alineado a la derecha -->
                    <ul class="navbar-nav ml-auto" style="margin-right: 20px;">
                      <li class="nav-item">
                        <a class="nav-link text-white" href="#sobre-nosotros">Sobre nosotros</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="#paquetes-turisticos">Paquetes turísticos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="#destinos">Destinos</a>
                      </li>
                    </ul>

                    <!-- Div con enlaces de Log in y Register a la derecha -->
                    <div class="navbar-nav">
                        @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                                <a href="{{ url('/home') }}" class="font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Inicio</a>
                            @else
                                <a href="{{ route('login') }}" class="font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Acceso</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registro</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                    </div>
                  </div>
                </div>
              </nav>

            <!-- Inicio del carrusel -->
            <div id="carouselExample" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('img/salar-Uyuni.jpg') }}" class="d-block w-100" alt="Primera imagen">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>No pierdas la oportunidad de experimentar una aventura en el salar más grande del mundo.</h5>
                      <a href="https://wa.me/59172364786?text=Hola, estoy interesado el tour ¿pueden brindarme en más información?" class="btn btn-success" target="_blank">Reserva ahora</a>
                    </div>
                  </div>

                  <div class="carousel-item">
                    <img src="{{ asset('img/parque-Cretácico.jpg') }}" class="d-block w-100" alt="Segunda imagen">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Explora una de las reservas más importantes de huellas de dinosaurios.</h5>
                      <a href="https://wa.me/59172364786?text=Hola, estoy interesado el tour ¿pueden brindarme en más información?" class="btn btn-success" target="_blank">Reserva ahora</a>
                    </div>
                  </div>

                  <div class="carousel-item">
                    <img src="{{ asset('img/cerro-Potosí.jpg') }}" class="d-block w-100" alt="Tercera imagen">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Conoce el esplendor y magestuosidad de la ciudad con más historia de Bolivia.</h5>
                      <a href="https://wa.me/59172364786?text=Hola, estoy interesado el tour ¿pueden brindarme en más información?" class="btn btn-success" target="_blank">Reserva ahora</a>
                    </div>
                  </div>
                </div>

                <!-- Controles del carrusel -->
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Siguiente</span>
                </a>
              </div>
            </div>
            <!-- Sección sobre nosotros -->
            <section class="section" id="sobre-nosotros">
                <h2 class="title">¿Quiénes somos?</h2>
                <div class="description">
                    <p><strong>Flamingotravels</strong> es una agencia de viajes con su sede en la ciudad de Uyuni, somos especialistas en la organización y calidad de viajes que incluyen al Salar de Uyuni (nuestro principal destino turístico de nuestro país), Como Agencia de turismo brindamos una amplia gama de rutas turísticas y de esa forma responder a la exigencia de servicios y con el respaldo de profesionales altamente calificado y oportunos.</p>
                </div>
            </section>
            <!-- Sección paquetes turísticos -->
            <section class="section" id="paquetes-turisticos">
                <h2 class="title"> Nuestros paquetes turísticos</h2>
                <div class="packages-container">
                  <div class="tour-card">
                    <img src="{{ asset('img/salar.jpg') }}" alt="">
                    <h4>Tour Salar de Uyuni</h4>
                    <p>Explora el desierto de sal más grande del mundo con vistas impresionantes.</p>
                    <a href="https://wa.me/59172364786?text=Hola, estoy interesado en el tour ¿pueden brindarme en más información?" class="btn btn-success" target="_blank">Reserva ahora</a>
                  </div>
                  <div class="tour-card">
                    <img src="{{ asset('img/laguna-colorada.jpg') }}" alt="">
                    <h4>Tour Lagunas</h4>
                    <p>Descubre coloridas lagunas altiplánicas rodeadas de paisajes surrealistas.</p>
                    <a href="https://wa.me/59172364786?text=Hola, estoy interesado en el tour ¿pueden brindarme en más información?" class="btn btn-success" target="_blank">Reserva ahora</a>
                  </div>
                  <div class="tour-card">
                    <img src="{{ asset('img/arbol-piedra.jpg') }}" alt="">
                    <h4>Tour Árbol de Piedra</h4>
                    <p>Admira esta fascinante formación rocosa en medio del desierto de Siloli.</p>
                    <a href="https://wa.me/59172364786?text=Hola, estoy interesado en el tour ¿pueden brindarme en más información?" class="btn btn-success" target="_blank">Reserva ahora</a>
                  </div>
                  <div class="tour-card">
                    <img src="{{ asset('img/cretacico.jpg') }}" alt="">
                    <h4>Tour Parque Cretácico</h4>
                    <p>Revive la era de los dinosaurios con huellas y fósiles auténticos.</p>
                    <a href="https://wa.me/59172364786?text=Hola, estoy interesado en el tour ¿pueden brindarme en más información?" class="btn btn-success" target="_blank">Reserva ahora</a>
                  </div>
                  <div class="tour-card">
                    <img src="{{ asset('img/minas-potosi.jpg') }}" alt="">
                    <h4>Tour Cerro Rico de Potosí</h4>
                    <p>Visita la histórica montaña que impulsó el auge de la plata en Potosí.</p>
                    <a href="https://wa.me/59172364786?text=Hola, estoy interesado en el tour ¿pueden brindarme en más información?" class="btn btn-success" target="_blank">Reserva ahora</a>
                  </div>
                  <div class="tour-card">
                    <img src="{{ asset('img/casa-moneda.jpg') }}" alt="">
                    <h4>Tour Museos de Potosí</h4>
                    <p>Explora la riqueza cultural y minera de Potosí en sus fascinantes museos.</p>
                    <a href="https://wa.me/59172364786?text=Hola, estoy interesado en el tour ¿pueden brindarme en más información?" class="btn btn-success" target="_blank">Reserva ahora</a>
                  </div>
                </div>
            </section>
            <!-- Sección Destinos -->
            <section class="section" id="destinos">
              <h2 class="title">Conoce más sobre nuestros Destinos</h2>
              <div id="tourCarousel" class="carousel slide custom-carousel" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <img src="{{ asset('img/Uyuni.jpg') }}" class="d-block w-100" alt="Tour Uyuni">
                        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                            <h2 class="text-white">Uyuni: Una experiencia imperdible</h2>
                            <a href="#" class="btn btn-light">Ver detalles</a>
                        </div>
                    </div>
            
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <img src="{{ asset('img/Potosí.jpg') }}" class="d-block w-100" alt="Tour Potosí">
                        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                            <h2 class="text-white">Potosí: Patrimonio de la humanidad</h2>
                            <a href="#" class="btn btn-light">Ver detalles</a>
                        </div>
                    </div>
            
                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <img src="{{ asset('img/Sucre.jpg') }}" class="d-block w-100" alt="Tour Sucre">
                        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                            <h2 class="text-white">Sucre: La ciudad blanca</h2>
                            <a href="#" class="btn btn-light">Ver detalles</a>
                        </div>
                    </div>
                </div>

                <!-- Controles del carrusel -->
                <a class="carousel-control-prev" href="#tourCarousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#tourCarousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Siguiente</span>
                </a>
            </div>
            </section>
            <!-- Sección del footer -->
            <footer class="bg-dark text-white py-4">
              <div class="container d-flex justify-content-between align-items-center">
                  <!-- Logo en el lado izquierdo -->
                  <div>
                      <img src="{{ asset('img/flamingo_logo1.png') }}" alt="Logo" style="width: 70px;">
                  </div>
                  <!-- Íconos de redes sociales en el lado derecho -->
                  <div class="social-icons">
                    <p>Síguenos en nuestras redes sociales:</p>
                      <a href="#" class="text-white me-3"><i class="bi bi-facebook" style="font-size: 2rem;"></i></a>
                      <a href="#" class="text-white me-3"><i class="bi bi-instagram" style="font-size: 2rem; margin-left: 1rem;"></i></a>
                      <a href="#" class="text-white me-3"><i class="bi bi-youtube" style="font-size: 2rem; margin-left: 1rem;"></i></a>
                      <a href="#" class="text-white"><i class="bi bi-tiktok" style="font-size: 2rem; margin-left: 1rem;"></i></a>
                  </div>
              </div>
          </footer>
          

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Incluye el JavaScript de Bootstrap y Popper.js al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script ript src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    </body>
</html>
