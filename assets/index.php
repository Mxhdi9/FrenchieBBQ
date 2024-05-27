<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Frenchie BBQ</title>

  <!-- Styles -->
  <link rel="stylesheet" href="./css/Frenchiebbq.css">
  <link rel="stylesheet" href="./css/media_query.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Scripts -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <body>
    <!-- Votre contenu HTML existant -->

    <!-- Scripts JavaScript -->


</body>


</head>

<body>
  <div class="container">
  <header>
    <nav class="navbar">
        <div class="navbar-wrapper">
            <a href="#">
                <img src="/assets/images/logo.png" alt="Logo de l'entreprise" width="30">
            </a>
            <ul class="navbar-nav">
                <li><a href="#home" class="nav-link">Accueil</a></li>
                <li><a href="#about" class="nav-link">A propos</a></li>
                <li><a href="#services" class="nav-link">Services</a></li>
                <li><a href="#menu" class="nav-link">Nos Produits</a></li>
                <li><a href="/assets/localisation/localisation.php" class="nav-link">Localisation</a></li>
            </ul>
            <div class="navbar-btn-group">
                <?php
                session_start();
                if (isset($_SESSION['email'])) {
                    // Si l'utilisateur est connecté, afficher la photo de profil et le menu déroulant
                    echo '<div class="dropdown">
                            <button class="profile-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">'; // Bouton de la photo de profil
                            // Vous pouvez récupérer la photo de profil de la base de données et l'afficher ici
                    echo '</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="/assets/connexion/profil.php">Mon Profil</a></li>
                                <li><a class="dropdown-item" href="/assets/reservation/devis.php">Reservation</a></li>

                                <li><a class="dropdown-item" href="/assets/connexion/deconnexion.php">Déconnexion</a></li>
                            </ul>
                          </div>';
                } else {
                    // Si l'utilisateur n'est pas connecté, afficher le bouton de connexion normal
                    echo '<a href="/assets/connexion/connexion.php" class="connexion-btn">Connexion</a>';
                }
                ?>
                <a href="/assets/admin/connexion.php" class="admin-btn">Administrateur</a>
            </div>
        </div>
    </nav>
</header>


    <main>

      <!--
        - #HOME SECTION
      -->

      <section class="home" id="home">

        <div class="home-left">

          <p class="home-subtext">Bienvenue sur notre site !</p>

          <h1 class="main-heading">Slogan ...</h1>

          <p class="home-text">
            Consectetur numquam poro nemo veniam eligendi rem adipisci quo modi (lorem ipsum)
          </p>

          <div class="btn-group">

            <button class="btn btn-primary btn-icon">
            <a href="/assets/caroussel/caroussel.php">
             Voir photos
            </button>

            <button class="btn btn-secondary btn-icon">
            <a href="/assets/carte/menus.php" class="nav-link">Notre carte complète</a>  
            <img src="/assets/images/arrow.svg" alt="menu icon">
            </button>

          </div>

        </div>

        <div class="home-right">

          <img src="./images/Brisket.png" alt="food image" class="food-img food-1" width="200" loading="lazy">
          <img src="./images/Burger.png" alt="food image" class="food-img food-2" width="200" loading="lazy">
          <img src="./images/Macaronicheese.png" alt="food image" class="food-img food-3" width="200" loading="lazy">

          

          

        </div>

      </section>

      <!--
        - #ABOUT SECTION
      -->

      <section class="about" id="about">

        <div class="about-left">

          <div class="img-box">
            <img src="./images/interrogation.png" alt="about image" class="about-img" width="250">
          </div>

          <div class="abs-content-box small">
            <div class="dotted-border">
              <p class="number-lg">?</p>
              <p class="text-sm">Dominique<br> KODJO</p>
            </div>
          </div>
          

        </div>

        <div class="about-right">

          <h2 class="section-title">L'histoire de Frenchie BBQ</h2>

          <p class="section-text">
            De l'Amérique à la France : une passion pour le BBQ.

Après avoir passé 30 ans aux États-Unis, son fondateur, un véritable passionné de barbecue, décide de ramener la culture du BBQ en France.

Arrivé en France, il lance le FrenchieBBQ, un concept de barbecue ambulant, pour partager son amour du barbecue américain avec les Français.

Le premier FrenchieBBQ voit le jour à Poissy, attirant les amateurs de bonne cuisine aux alentours de cette même ville .

En cas de succès, son fondateur prévoit d'étendre le FrenchieBBQ à travers la France, avec pour ambition de devenir une référence nationale du barbecue ambulant .

Chez FrenchieBBQ, nous croyons en la qualité des ingrédients, en l'authenticité des recettes et en l'importance du partage autour d'une bonne table.
          </p>


        </div>

      </section>

      <!--
        - #SERVICES SECTION
      -->

      <section class="services" id="services">
        <div class="service-card">
          <p class="card-number">01</p>
          <h3 class="card-heading">Nous sommes situés au centre ville </h3>
          <p class="card-text">
            A poissy & ces alentours , FrenchieBBQ sera prêt à accueillir toutes personnes se situant à proximité.
          </p>
        </div>

        <div class="service-card">

          <p class="card-number">02</p>

          <h3 class="card-heading">Ingrédients frais</h3>

          <p class="card-text">
            Porro nemo veniam necessitatibus praesentium eligendi rem temporibus adipisci quo modi numquam.(Lorem ipsum)
          </p>

        </div>

        <div class="service-card">

          <p class="card-number">03</p>

          <h3 class="card-heading">Préparation rapide</h3>

          <p class="card-text">
            Porro nemo veniam necessitatibus praesentium eligendi rem temporibus adipisci quo modi numquam.(Lorem ipsum)
          </p>

        </div>

        <div class="service-card">

          <p class="card-number">04</p>

          <h3 class="card-heading">Professionel & chef expérimenté</h3>

          <p class="card-text">
            Porro nemo veniam necessitatibus praesentium eligendi rem temporibus adipisci quo modi numquam.(Lorem ipsum)
          </p>

        </div>

        <div class="service-card">

          <p class="card-number">05</p>

          <h3 class="card-heading">Services de qualité</h3>

          <p class="card-text">
            Porro nemo veniam necessitatibus praesentium eligendi rem temporibus adipisci quo modi numquam.(Lorem ipsum)
          </p>

        </div>

      </section>

      <!--
        - #PRODUCT SECTION
      -->

      <section class="product" id="menu">

        <h2 class="section-title">Nos produits phare</h2>

        <p class="section-text">
          Consectetur numquam poro nemo veniam
          eligendi rem adipisci quo modi.
        </p>

        <div class="products-grid">

          <a href="#">

            <div class="product-card">

              <div class="img-box">
                <img src="./images/Chicken barbecue.jpg" alt="product image" class="product-img" width="5" loading="lazy">
              </div>

              <div class="product-content">

                <div class="wrapper">
                  <h3 class="product-name">Chicken Barbecue</h3>

                  <p class="product-price">
                    <span class="small">€</span>11
                  </p>
                </div>

                <p class="product-text">
                  Poulet cuit au four , sauce maison , fait avec amour.
                </p>


              </div>

            </div>

          </a>

          <a href="#">

            <div class="product-card">

              <div class="img-box">
                <img src="./images/frites.jpg" alt="product image" class="product-img" width="200" loading="lazy">
              </div>

              <div class="product-content">

                <div class="wrapper">
                  <h3 class="product-name">Frites maison</h3>

                  <p class="product-price">
                    <span class="small">€</span>14
                  </p>
                </div>

                <p class="product-text">
                  Frites , sauce maison , épices secretes
                </p>


              </div>

            </div>

          </a>

          <a href="#">

            <div class="product-card">

              <div class="img-box">
                <img src="./images/Brisket.png" alt="product image" class="product-img" width="200" loading="lazy">
              </div>

              <div class="product-content">

                <div class="wrapper">
                  <h3 class="product-name">Brisket de porc</h3>

                  <p class="product-price">
                    <span class="small">€</span>9
                  </p>
                </div>

                <p class="product-text">
                  Porc grillé avec un sauce maison
                </p>

              </div>

            </div>

          </a>

          <a href="#">

            <div class="product-card">

              <div class="img-box">
                <img src="./images/Burger.png" alt="product image" class="product-img" width="100" loading="lazy">

                <div class="card-badge red">
                  <ion-icon name="flame"></ion-icon>
                  <p>Hot</p>
                </div>
              </div>

              <div class="product-content">

                <div class="wrapper">
                  <h3 class="product-name">Pulled Burger</h3>

                  <p class="product-price">
                    <span class="small">€</span>4
                  </p>
                </div>

                <p class="product-text">
                  Cheddar , Effiloché de porc , Oignon rouge , Oignons frits , Pomme de terre
                </p>

              </div>

            </div>

          </a>

          <a href="#">

            <div class="product-card">

              <div class="img-box">
                <img src="./images/Macaronicheese.png" alt="product image" class="product-img" width="100" loading="lazy">

                <div class="card-badge green">
                  <ion-icon name="leaf"></ion-icon>
                  <p>Vegan</p>
                </div>
              </div>

              <div class="product-content">

                <div class="wrapper">
                  <h3 class="product-name">Macaroni cheese </h3>

                  <p class="product-price">
                    <span class="small">€</span>6
                  </p>
                </div>

                <p class="product-text">
                  sel , poivre , cheddar , macaroni , lait , beurre 
            </p>

              </div>

            </div>

          </a>

          <a href="#">

            <div class="product-card">

              <div class="img-box">
                <img src="./images/Ribs.png" alt="product image" class="product-img" width="100" loading="lazy">
              </div>

              <div class="product-content">

                <div class="wrapper">
                  <h3 class="product-name">Barbecue Ribs</h3>

                  <p class="product-price">
                    <span class="small">€</span>14
                  </p>
                </div>

                <p class="product-text">
                  Travers de porc , piment de cayenne , sel , poivre , sucre/miel (au choix).
                </p>

              </div>

            </div>

          </a>

        </div>

        <button class="btn btn-primary btn-icon">
          <a href="/assets/caroussel/caroussel.php">
            <img src="./images/menu.svg" alt="menu icon">
              Toute la carte
          </a>
        </button>


      </section>

    </body>
      <!--
        - #LOCATION SECTION
      --><footer>
      <div class="footer-wrapper">
        <a href="#">
          <img src="./images/logo.png" alt="logo" class="footer-brand" width="50">
        </a>
        <div class="social-link">
          <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
          <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
          <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
          <a href="#"><ion-icon name="logo-youtube"></ion-icon></a>
        </div>
      </div>
    </footer>
