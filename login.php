<?php
require_once('connectionDB.php');


if(isset($_POST['user']) && $_POST['user']!=""){
	//almacenamos en variables los daots del formulario
	$user=$_POST['user'];
	$pwd=$_POST['pwd'];

	$myConection = mysqlDB::getConexion();

	$persona= loginUsers($myConection,$user,$pwd);
	if($persona == false){
		echo "unauthorized!!!";
		echo "<a href='index.html'>regresar login</a>";
	}else{
		require_once('admin.php');
	}
}



//method login
function loginUsers($cn ,$usuarioLogin,$passLogin ){
	try{
		$sql="SELECT * FROM login WHERE usuario=? AND pwd=?";
		$result=$cn->prepare($sql);
		$result->execute(array($usuarioLogin,$passLogin));
		if($result->rowCount()>0){
			return $result->fetch(PDO::FETCH_OBJ);
		}
		return false;

	}catch(Exception $e){
		die("error: ".$e->getMessage());
	}
}
