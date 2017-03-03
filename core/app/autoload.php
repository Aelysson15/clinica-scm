<?php
// autoload.php
// 03 de Mar de 2017
// esta funcao elimina o feito de está agregando modelos manualmente


function __autoload($modelname){
	if(Model::exists($modelname)){
		include Model::getFullPath($modelname);
	} 
}



?>