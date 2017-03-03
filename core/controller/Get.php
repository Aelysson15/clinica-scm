<?php


// 03 de Mar de 2017
// Get.php
// @brief isso é algo muito mais magico

class Get {
	function __get($value){
		if(!$this->exist($value)){
			print "<b>GET ERROR</b> O parametro <b>$value</b> não existe!";
			die();
		}
		return $_GET[$value];
	}

	function  exist($value){
		$found = false;
		if(isset($_GET[$value])){
			$found=true;
		}
		return $found;
	}
}



?>