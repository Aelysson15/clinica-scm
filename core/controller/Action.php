<?php


// 03 de Março del 2017
// Action.php
// @brief Um action corresponde a uma rotina de um modulo.

class Action {
	/**
	* @function load
	* @brief a funcao load carrega uma view correspondiente a um modulo
	**/	
	public static function load($action){
		// Module::$module;
		
		if(!isset($_GET['action'])){
			include "core/app/action/".$action."-action.php";
		}else{


			if(Action::isValid()){
				include "core/app/action/".$_GET['action']."-action.php";				
			}else{
				Action::Error("<b>404 NOT FOUND</b> Action <b>".$_GET['action']."</b> folder  !! - <a href='./error.html' target='_blank'>Help</a>");
			}



		}
	}

	/**
	* @function isValid
	* @brief valida a existencia de uma view
	**/	
	public static function isValid(){
		$valid=false;
		if(file_exists($file = "core/app/action/".$_GET['action']."-action.php")){
			$valid = true;
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

	public function execute($action,$params){
		$fullpath =  "core/app/action/".$action."-action.php";
		if(file_exists($fullpath)){
			include $fullpath;
		}else{
			assert("wtf");
		}
	}

}



?>