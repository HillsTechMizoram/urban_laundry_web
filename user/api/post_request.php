<?php
session_start();

include 'dbcon.php';

$lmsuid = $_SESSION['lduid'];
$dol = $_SESSION['date'];
$topwear = $_SESSION['topwear'];
$bootomwear = $_SESSION['bottomwear'];
$woolencloth = $_SESSION['woolencloth'];
$others = $_SESSION['others'];
$service = $_SESSION['service'];
$pkadd = $_SESSION['address'];
$contperson = $_SESSION['contactperson'];
$dec = $_SESSION['description'];
$ptype = $_POST['paymenttype'];
$status = 0;

// $fistname = $_POST['fistname'];
// $lastname = $_POST['lastname'];
// $phone = $_POST['phone'];
// $address = $_POST['address'];


$link->query("INSERT INTO  tbllaundryreq(UserID,DateofLaundry,TopWear,BootomWear,WoolenCloth,Other,Service,PickupAddress,ContactPerson,Description,Status,PaymentType)VALUES('" . $lmsuid . "','" . $dol . "','" . $topwear . "','" . $bootomwear . "','" . $woolencloth . "','" . $others . "','" . $service . "','" . $pkadd . "','" . $contperson . "','" . $dec . "','" . $status . "','" . $ptype . "')");
