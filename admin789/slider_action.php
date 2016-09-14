<?php

include "config/koneksi.php";
include "config/form_maker.php";
session_start();

$master = 'slider' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='hapus')
{
	delete_file('image',$master,'../images/slider','id',$id);
	$query = mysqli_query($con,"DELETE FROM ".$master." WHERE id = '$id'");	
	echo mysqli_error($con);
	header("location:".$master."_view.php");		    
}

elseif ($action=='edit')
{
	$query = "UPDATE ".$master." SET 
			 title = '$_POST[title]',                             			 
                         title = '$_POST[title]'
			 WHERE id = '$id'";

	mysqli_query($con,$query);

	if ($_FILES['file']['name'] <> '')
		{
			upload_file('../images/slider','file');
                        delete_file($master.'_image',$master,'../images/slider',$master.'_id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image = '$nama_final' WHERE id = '$id' ");
		}

    echo mysqli_error($con);
	header("location:".$master."_edit.php?id=$id");
}

elseif ($action=='input')
{
	upload_file('../images/slider','file');

 	mysqli_query($con,"INSERT INTO ".$master." VALUES (
 				 '',
				 '$_POST[title]',				 
				 '$nama_final',
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