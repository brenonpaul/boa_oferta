<?php
session_start();
unset($_SESSION['Usuariologado']);
session_destroy();
?>
<script>location.href='../index.php';
		localStorage.clear();</script> 
<?php exit('Redirecionando...'); ?>