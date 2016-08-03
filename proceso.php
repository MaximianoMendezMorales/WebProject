<?php
include_once "control/usuarios.php";
$clsUsuarios = new usuarios();

if(isset($_POST['txtuser']) && isset($_POST['txtpass'])){
	$currUserVO= $clsUsuarios->getByUserPass($_POST['txtuser'],$_POST['txtpass']);
	if(sizeof($currUserVO) > 0) {
		foreach ($currUserVO as $UserVO) {
    		echo "Correcto";
		}
    }
	else{
		echo "Incorrecto";
	}
}
