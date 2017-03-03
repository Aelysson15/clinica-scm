<?php
// IpLogger
// Função desta classe é:
// Obter o ip do cliente que está nos visitar e saber se você é um visitante
// Ou você é um usuário registrado.
// >>> Em caso de actividade visitante a inscrever-se como um visitante
// Esta informação será apagada em 3 dias
// Deve ser um usuário registrado, sua atividade é registrada
// Quando o usuário visita o perfil de outro, apenas a apontada em visitas 1time cada 24 horas.
// A informação de utilizador registado não é removido.

class IpLogger {

public static function getRealIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) // se o IP é compartilhado
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) // se a partir de um proxy
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];
}

public static function addIP(){
	if(UserLogged::isLogged()){
		if(!self::verifyIP()){
		$con = Database::getCon();
		$sql = "insert into iplog (user_id,realip,created_at) value(".Session::getUID().",\"".self::getRealIP()."\",".time().")";
		$con->query($sql);
		return $con->insert_id;
		}
	}else {
		return false;
	}
}

public static function getIPLogId(){
	$con = Database::getCon();
$sql = "select * from iplog where realip=\"".self::getRealIP()."\" and user_id=".Session::getUID()." order by created_at desc limit 1";
	$query = $con->query($sql);
	$ca = 0;
	$id=0;
	while($r=$query->fetch_array()){
//		$found = true ;
		$ca = $r['created_at'];
		$id = $r['id'];
	}
		$found=false;
		$ca2 = $ca + (24)*3600;
		if(time()>=$ca2){
			$found=true;
		}

		if($found==true){
			// se for maior, em seguida, gerar um novo id
			$id = self::addIP();
		}else {

		}
		return array("id"=>$id,"ca"=>$ca);

}

public static function verifyIP(){
	$con = Database::getCon();
	$sql = "select * from iplog where realip=\"".self::getRealIP()."\" and user_id=".Session::getUID();
	$query = $con->query($sql);
	$found=false;
	$ca = "" ;
	while($r=$query->fetch_array()){
		$found = true ;
		$ca = $r['created_at'];
	}

	if($found==true){
		$ca2 = $ca + (24)*3600;
		if(time()>=$ca2){
			$found=false;
		}
	}
	return $found;
}

}
?>