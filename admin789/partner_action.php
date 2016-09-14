<?php

include "config/koneksi.php";
include "config/form_maker.php";
session_start();

$master = 'partner' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='hapus')
{
	delete_file('image',$master,'../assets/images/awards','id',$id);
	$query = mysqli_query($con,"DELETE FROM ".$master." WHERE id = '$id'");	
	echo mysql_error();
	header("location:".$master."_view.php");				
}

elseif ($action=='edit')
{
	$query = "UPDATE ".$master." SET 
			 name = '$_POST[name]',
			 link = '$_POST[link]',			 			 
                         aktif = '$_POST[aktif]'
			 WHERE id = '$id'";

	mysqli_query($con,$query);

	if ($_FILES['file']['name'] <> '')
		{
			upload_file('../assets/images/awards','file');
			delete_file('image',$master,'../assets/images/awards','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image = '$nama_final' WHERE id = '$id' ");
		}

	echo mysqli_error($con);
	header("location:".$master."_edit.php?id=$id");
}

elseif ($action=='input')
{
	upload_file('../assets/images/awards','file');

 	mysqli_query($con,"INSERT INTO ".$master." VALUES (
 				 '',
 				 '$_POST[name]',				 
 				 '$nama_final',
                                 '$_POST[link]',				 
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