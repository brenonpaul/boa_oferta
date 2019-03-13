<?php
	require_once "cabecalho.php";
?>

<body>
  <div class="container" style="background: #ccc; padding-top: 3%; padding-bottom: 5%; margin-top: 3%;">
	 <div id="demo" class="carousel slide carouselIndex" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul> 
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="imagens/pera.jpg" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img src="imagens/maca.jpg" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="imagens/pera.jpg" alt="New York">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
</body>

<?php
	require_once "rodape.php";
?>
</html>