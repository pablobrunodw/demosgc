<?php 
	require '../Functions.php';


	$user = new User_Actions;

	//Datos de logueo
	$login = $user->logIn($_POST['email'],$_POST['pass']);

	if ($login) {

		$user_profile = $user->getUserInfo($_POST['email']);
		//Inicio de Sesión
		$_SESSION['user'] = $user_profile[0]["username"];

		echo $_SESSION['user'];
	}else{
		echo "false";
	};
?>