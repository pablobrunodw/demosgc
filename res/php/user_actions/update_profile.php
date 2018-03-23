<?php 
	require '../Functions.php';
	$obj = new User_Actions();

	
	$profile_path = "/res/img/img_profiles/" . $_FILES['img_profile']["name"];
	

	$save = $obj->updateProfile($_POST['txtId'],$_POST['txtName'], $_POST['txtLastName'], $_POST['txtUserName'], $_POST['txtEmailReg']);


	if($_FILES['img_profile']["name"] != "" ){
		
		$img_profile = $obj->updateProfileImg($_POST['txtId'],$profile_path );
		move_uploaded_file($_FILES['img_profile']["tmp_name"] , "../../img/img_profiles/" . $_FILES["img_profile"]["name"]);
	};
	
	if ($save > 0) {
		echo "true";
	} else {
		echo "false";
	};
	
?>