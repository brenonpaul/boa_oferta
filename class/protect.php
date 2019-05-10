<?php
if(!function_exists("protect")){

  function protect(){

    if(!isset($_SESSION[UsuarioLogado])){

      
      echo "<script>location.href='login.php';</script>";
      exit('Login inválido: Redirecionando...');

    }

  }

}

protect();
?>