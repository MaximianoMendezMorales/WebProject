<?php
include_once "control/usuarios.php";
try{
	$clsUsuarios=new usuarios();
	$userActual = new UserVO();
	if(isset($_POST['ID'])){
		$userActual->setId($_POST['ID']);
		$regAfectados=$clsUsuarios->delete($userActual);
		if($regAfectados > 0) {
			echo $regAfectados." Registros Afectado";
		}
		else{
			echo "0 Registros Afectado";
		}
	}
}
catch(Exception $exc){

}
