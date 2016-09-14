<?php

include "config/koneksi.php";
include "config/form_maker.php";
session_start();

$master = 'contact_us' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}


if ($action=='edit')
{
	$query = "UPDATE ".$master." SET 
			 email = '$_POST[email]'
			 WHERE id = '$id'";

	mysqli_query($con,$query);

echo mysqli_error($con);
	
	header("location:contact_us.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>