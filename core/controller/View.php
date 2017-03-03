<?php


// 03 de Março del 2017
// View.php
// @brief Uma view corresponde a cada componente visual dentro de um modulo.

class View {
	/**
	* @function load
	* @brief a funcao load carrega uma vista correspondente a um modulo
	**/	
	public static function load($view){
		// Module::$module;
		if(!isset($_GET['view'])){
			if(Core::$root==""){
				include "core/app/view/".$view."-view.php";
			}else if(Core::$root=="admin/"){
				include "core/app/".Core::$theme."/view/".$view."-view.php";				
			}
		}else{


			if(View::isValid()){
				$url ="";
			if(Core::$root==""){
			$url = "core/app/view/".$_GET['view']."-view.php";
			}else if(Core::$root=="admin/"){
			$url = "core/app/".Core::$theme."/view/".$_GET['view']."-view.php";				
			}
				include $url;				
			}else{
				View::Error("<b>404 NOT FOUND</b> View <b>".$_GET['view']."</b> folder !! - <a href='http://evilnapsis.com/legobox/help/' target='_blank'>Help</a>");
			}



		}
	}

	/**
	* @function isValid
	* @brief valida a existencia de uma view
	**/	
	public static function isValid(){
		$valid=false;
		if(isset($_GET["view"])){
			$url ="";
			if(Core::$root==""){
			$url = "core/app/view/".$_GET['view']."-view.php";
			}else if(Core::$root=="admin/"){
			$url = "core/app/".Core::$theme."/view/".$_GET['view']."-view.php";				
			}
			if(file_exists($file = $url)){
				$valid = true;
			}
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

}



?>