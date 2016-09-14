<?php

include "config/koneksi.php";
include "config/form_maker.php";
session_start();

$master = 'keterlibatan' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='edit')
{
	$query = "UPDATE ".$master." SET 			
			 text1 = '$_POST[text1]',
			 text2 = '$_POST[text2]',
			 text3 = '$_POST[text3]'
			 
			 WHERE id = '$id'";

	mysqli_query($con,$query);

echo mysqli_error($con);

	if ($_FILES['image1']['name'] <> '')
		{
			upload_file('../images/keterlibatan/','image1');
			delete_file('image1',$master,'../images/keterlibatan/','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image1 = '$nama_final' WHERE id = '$id' ");
		}

	if ($_FILES['image2']['name'] <> '')
		{
			upload_file('../images/keterlibatan/','image2');
			delete_file('image2',$master,'../images/keterlibatan/','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image2 = '$nama_final' WHERE id = '$id' ");
		}

	if ($_FILES['image3']['name'] <> '')
		{
			upload_file('../images/keterlibatan/','image3');
			delete_file('image3',$master,'../images/keterlibatan/','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image3 = '$nama_final' WHERE id = '$id' ");
		}

	if ($_FILES['image4']['name'] <> '')
		{
			upload_file('../images/keterlibatan/','image4');
			delete_file('image4',$master,'../images/keterlibatan/','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image4 = '$nama_final' WHERE id = '$id' ");
		}

	if ($_FILES['image_home']['name'] <> '')
		{
			upload_file('../images/keterlibatan/','image_home');
			delete_file('image_home',$master,'../images/keterlibatan/','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image_home = '$nama_final' WHERE id = '$id' ");
		}

echo mysqli_error($con);	
	header("location:".$master."_edit.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>