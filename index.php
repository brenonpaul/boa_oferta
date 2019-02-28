<?php
	require_once "cabecalho.php";
?>

<body>
	<div class="container" style="margin-top: 3%">
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    		<div class="carousel-inner">
    			<div class="carousel-item active">
      				<img src="imagens/maca.jpg" class="d-block w-100" >
    			</div>
   			<div class="carousel-item">
      			<img src="imagens/pera.jpg" class="d-block w-100" >
    		</div>
    		<div class="carousel-item">
     			 <img src="imagens/maca.jpg" class="d-block w-100" >
    		</div>
 		</div>
  		<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    		<span class="sr-only">Previous</span>
  		</a>
  		<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
   			<span class="sr-only">Next</span>
  		</a>
		</div>
	</div>

</body>

<?php
	require_once "rodape.php";
?>
</html>