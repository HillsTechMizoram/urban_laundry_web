<?php
$db = mysqli_connect('localhost', 'root', '', 'lmsdb');

$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT ID FROM tbluser WHERE FullName = '" . $username . "' AND Email = '" . $email . "' AND Password = '" . $password . "'";

$result = mysqli_query($db, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
	echo json_encode("Success");
} else {
	echo json_encode("Error");
}

// $email = $_POST['Email'];
// $password = md5($_POST['Password']);

// $sqlQuery = "SELECT * FROM tblusers WHERE Email = '$email' AND Password = '$password'";

// $resultOfQuery = $connectNow->query($sqlQuery);

// if ($resultOfQuery->num_rows > 0) 
// {
// 	$userRecord = array();
// 	while ($rowFound = $resultOfQuery->fetch_assoc()) 
// 	{
// 		$userRecord[] = $rowFound;
// 	}
// 	echo json_encode(
// 		array(
// 			'success' => true,
// 			'userData' => $userRecord[0],
// 		)
// 	);
// } else {
// 	echo json_encode(array("success" => false));
// }
