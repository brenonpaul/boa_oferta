<?php
require_once("cabecalho.php");
?>

<div class="container">
	<h2 class="text-center mt-4 mb-4">Sobre</h2>
	<div class="row d-flex justify-content-center">
		<div class="col-6 bg-white">
			<p style="font-size: 125%; text-indent:2em;" class="text-justify ">
				O site foi criado a partir da ideia de facilitar a vida dos consumidores em suas
				compras diárias, uma vez que todas as pessoas buscam comprar seu produto preferido
				com a possibilidade de encontrar o menor preço, utilizando o menor tempo possível
				para isso.
			</p>
			<p style="font-size: 125%; text-indent:2em;" class="text-justify">
				Ao se conectar com o site, o usuário poderá ter acesso ao preço dos produtos de
				supermercados cadastrados por outros usuários, descobrindo onde encontrar o melhor
				preço, sem sair de casa para procurar a mercadoria desejada. Além disso, o usuário,
				após criar uma conta, poderá auxiliar outros utilizadores do site, postando os preços
				encontrados por ele, criando assim uma comunidade que ajuda um ao outro.
			</p>
			<h4 class="text-center mb-4">Resumo das páginas do site:</h4>
			
			<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul> 
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <p style="font-size: 125%;" class="text-justify">
		<strong>Home:</strong> É a página principal do site, que lista todos os produtos cadastrados e ordenados pela data que o usuário viu o produto.
	</p>
    </div>
    <div class="carousel-item">
      <p style="font-size: 125%;" class="text-justify">
		<strong>Categorias:</strong> Uma página que permite ao usuário ver todos os tipos de categorias de alimentos, assim como também o possibilita filtrar os produtos por por suas respectivas categorias.
	</p>
</div>
    <div class="carousel-item">
      <p style="font-size: 125%;" class="text-justify">
      	<strong>Cadastrar Produto:</strong> É uma página na qual o usuário pode cadastrar produtos, para ter acesso a ela é necessário a criação de um conta e efetuar login.
      </p>
    </div>
    <div class="carousel-item">
      <p style="font-size: 125%;" class="text-justify">
      	<strong>Suporte Técnico:</strong> Essa página da a possibilidade de mandar uma mensagem para os administradores do site, como problemas ou sugestões do que pode ser melhorado e incrementado no site.
      </p>
    </div>
    <div class="carousel-item">
      <p style="font-size: 125%;" class="text-justify">
      	<strong>Seu Perfil:</strong> Página onde permite o usuário ver as informações de sua conta, podendo editá-las se desejar, assim como também mostra todas as postagens efetuadas pelo mesmo, sendo possível também alterar informações sobre os produtos cadastrados..
      </p>
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
	</div>
</div>

<?php
require_once("rodape.php");
?>