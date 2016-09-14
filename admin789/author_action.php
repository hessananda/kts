<?php

include "config/koneksi.php";
include "config/form_maker.php";
session_start();

$master = 'author' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='hapus')
{
	delete_file('image',$master,'../images/author','id',$id);
	$query = mysqli_query($con,"DELETE FROM ".$master." WHERE id = '$id'");	
	echo mysqli_error($con);
	header("location:".$master."_view.php");				
}

elseif ($action=='edit')
{
	$query = "UPDATE ".$master." SET 
			 nama = '$_POST[nama]',
			 email = '$_POST[email]',			 			
                         phone = '$_POST[phone]',			 			 
                         keterangan = '$_POST[keterangan]',			 			 
                         aktif = '$_POST[aktif]'
			 WHERE id = '$id'";

	mysqli_query($con,$query);

	if ($_FILES['file']['name'] <> '')
		{
			upload_file('../images/author','file');
			delete_file('image',$master,'../images/author','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image = '$nama_final' WHERE id = '$id' ");
		}

	echo mysqli_error($con);
	header("location:".$master."_edit.php?id=$id");
}

elseif ($action=='input')
{
	upload_file('../images/author','file');

 	mysqli_query($con,"INSERT INTO ".$master." VALUES (
 				 '',
 				 '$_POST[nama]',				 
                                 '$_POST[email]',
                                 '$_POST[keterangan]',				 
 				 '$nama_final',
                                 '$_POST[phone]',				 
                                 '$_POST[aktif]'
 				  ) ");
 
echo mysqli_error($con);
header("location:".$master."_view.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>