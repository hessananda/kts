<?php

include "config/koneksi.php";
include "config/form_maker.php";
session_start();

$master = 'tentang' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='edit')
{
	$query = "UPDATE ".$master." SET 
			 header_text1 = '$_POST[header_text1]',
			 header_text2 = '$_POST[header_text2]',		
			 header_text3 = '$_POST[header_text3]',			
			 text1 = '$_POST[text1]',
			 text2 = '$_POST[text2]',
			 text3 = '$_POST[text3]',
			 text4 = '$_POST[text4]',
			 text5 = '$_POST[text5]',
			 text6 = '$_POST[text6]'
			 
			 WHERE id = '$id'";

	mysqli_query($con,$query);

echo mysqli_error($con);

	if ($_FILES['image1']['name'] <> '')
		{
			upload_file('../images/tentang/','image1');
			delete_file('image1',$master,'../images/tentang/','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image1 = '$nama_final' WHERE id = '$id' ");
		}

	if ($_FILES['image2']['name'] <> '')
		{
			upload_file('../images/tentang/','image2');
			delete_file('image2',$master,'../images/tentang/','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image2 = '$nama_final' WHERE id = '$id' ");
		}

	if ($_FILES['image3']['name'] <> '')
		{
			upload_file('../images/tentang/','image3');
			delete_file('image3',$master,'../images/tentang/','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image3 = '$nama_final' WHERE id = '$id' ");
		}

	if ($_FILES['image4']['name'] <> '')
		{
			upload_file('../images/tentang/','image4');
			delete_file('image4',$master,'../images/tentang/','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image4 = '$nama_final' WHERE id = '$id' ");
		}

	if ($_FILES['image5']['name'] <> '')
		{
			upload_file('../images/tentang/','image5');
			delete_file('image5',$master,'../images/tentang/','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image5 = '$nama_final' WHERE id = '$id' ");
		}

	if ($_FILES['image6']['name'] <> '')
		{
			upload_file('../images/tentang/','image6');
			delete_file('image6',$master,'../images/tentang/','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image6 = '$nama_final' WHERE id = '$id' ");
		}


echo mysqli_error($con);	
	header("location:".$master."_edit.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>