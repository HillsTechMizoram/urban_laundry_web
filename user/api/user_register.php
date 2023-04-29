<?php
$db = mysqli_connect('localhost', 'root', '', 'lmsdb');
if (!$db) {
    echo "Database connection faild";
}

$fname = $_POST['fullname'];
$mobno = $_POST['mobilenumber'];
$email = $_POST['email'];
$password = md5($_POST['password']);


$sql = "SELECT Email FROM tbluser WHERE Email = '" . $email . "'";

$result = mysqli_query($db, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo json_encode("Error");
} else {
    $insert = "INSERT INTO tbluser(FullName, MobileNumber, Email, Password) VALUES ('" . $fname . "','" . $mobno . "','" . $email . "','" . $password . "')";
    $query = mysqli_query($db, $insert);
    if ($query) {
        echo json_encode("Success");
    }
}
