<?php 
	$db = mysqli_connect('localhost','root','','lmsdb');

    $email = $_POST['email'];
    $password = md5($_POST['password']);

	$sql = "SELECT ID FROM tbluser WHERE Email = '".$email."' AND Password = '".$password."'";

	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);

	if ($count == 1) {
		echo json_encode("Success");
	}else{
		echo json_encode("Error");
	}
