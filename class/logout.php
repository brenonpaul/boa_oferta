<?php
session_start();
unset($_SESSION['Usuariologado']);
session_destroy();
?>
<script>location.href='../view/index.php';
		localStorage.clear();</script> 
<?php exit('Redirecionando...'); ?>