<?php
session_start();
// ---
// a tarefa desse arquivo é apagar todo rastro de cookie

// -- eliminamos o usuario
if(isset($_SESSION['user_id'])){
	unset($_SESSION['user_id']);
}

session_destroy();
// v1 03 de Mar 2017
//estemos onde estemos nos redirecione ao index
print "<script>window.location='index.php';</script>";
?>