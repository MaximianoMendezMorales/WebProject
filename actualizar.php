<?php
include_once "control/usuarios.php";
try{
	$clsUsuarios=new usuarios();
	$userActual = new UserVO();
	if(isset($_POST['ins_id']) && isset($_POST['ins_user']) && isset($_POST['ins_pass'])){
		$userActual->setUsername($_POST['ins_user']);
		$userActual->setPassword($_POST['ins_pass']);
		$userActual->setId($_POST['ins_id']);
		$regAfectados=$clsUsuarios->save($userActual);
		if($regAfectados > 0) {
			echo $regAfectados." Registros Insertados";
		}
		else{
			echo "0 Registros Insertados";
		}
	}
}


catch(Exception $exc){

}
