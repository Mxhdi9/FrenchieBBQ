<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Carousel</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Styles -->
  <link href="./carousel.css" rel="stylesheet">
</head>
<body>

<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <!-- Carousel Inner -->
  <div class="carousel-inner">
    <!-- First Slide -->
    <div class="carousel-item active">
      <img src="/assets/images/caroussel1.jpg" class="d-block w-100" alt="Image 1">
      <!-- Carousel Caption -->
      <div class="carousel-caption d-none d-md-block">
        <h5>Tomahawk Steak</h5>
        <p>Description 1</p>
      </div>
    </div>
    <!-- Second Slide -->
    <div class="carousel-item">
      <img src="/assets/images/caroussel2.jpg" class="d-block w-100" alt="Image 2">
      <!-- Carousel Caption -->
      <div class="carousel-caption d-none d-md-block">
        <h5>Coleslaw</h5>
        <p>Description 2</p>
      </div>
    </div>
    <!-- Third Slide -->
    <div class="carousel-item">
      <img src="/assets/images/caroussel3.jpg" class="d-block w-100" alt="Image 3">
      <!-- Carousel Caption -->
      <div class="carousel-caption d-none d-md-block">
        <h5>Pulled Burger</h5>
        <p>Description 3</p>
      </div>
    </div>
  </div>
  <!-- Previous and Next Buttons -->
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Bouton "Description" -->
<div class="carousel-description-text">Description</div>

<!-- Description -->
<div class="carousel-description">
  <p>Description produits</p>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const descriptionText = document.querySelector('.carousel-description-text');
  const description = document.querySelector('.carousel-description');
  let descriptionVisible = false;

  // Afficher ou cacher la description lorsque le bouton est cliqué
  descriptionText.addEventListener('click', function() {
    if (descriptionVisible) {
      description.style.display = 'none';
      descriptionVisible = false;
    } else {
      description.style.display = 'block';
      descriptionVisible = true;
    }
  });
});
</script>
</body>
</html>
