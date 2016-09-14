<?php

include "config/koneksi.php";
include "config/form_maker.php";
session_start();

$master = 'program' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='hapus')
{
	delete_file('image',$master,'../images/program','id',$id);
	$query = mysqli_query($con,"DELETE FROM ".$master." WHERE id = '$id'");	
	echo mysqli_error($con);
	header("location:".$master."_view.php");				
}

elseif ($action=='edit')
{
    $content = str_replace("'","\'",$_POST['content']);

	$query = "UPDATE ".$master." SET 
			 title = '$_POST[judul]',
             author = '$_POST[penulis]',
			 content = '$content',	
             tag = '$_POST[tag]',		 
             video_link = '$_POST[video_link]',                    
             thumbnail = '$_POST[thumbnail]',  
             entrytime = '$_POST[entrytime]',   			 
             aktif = '$_POST[aktif]'
			 WHERE id = '$id'";

	mysqli_query($con,$query);

	if ($_FILES['file']['name'] <> '')
		{
			upload_file('../images/program','file');
			delete_file('image',$master,'../images/program','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image = '$nama_final' WHERE id = '$id' ");
		}

	echo mysqli_error($con);
	header("location:".$master."_edit.php?id=$id");
}

elseif ($action=='input')
{
        if($_POST['nama']<>''){
            upload_file('../images/author','foto_penulis');
            if($_FILES["foto_penulis"]['tmp_name'] == ''){
                $nama_final = 'author.png';
            }
            mysqli_query($con,"INSERT INTO author VALUES (
 				 '',
 				 '$_POST[nama]',				 
                                 '',				  				 
                                 'Author',
                                 '$nama_final',
                                 '',
                                 '1'                                                                 
 				  ) ");
            $penulis = mysqli_fetch_assoc(mysqli_query($con,"SELECT id FROM author WHERE nama = '$_POST[nama]' and image = '$nama_final' "));
            $id_penulis = $penulis['id'];
        }
        else{
            $id_penulis = $_POST['author'];
        }        
        
        upload_file('../images/artikel','file');
        
    $content = str_replace("'","\'",$_POST['content']);

 	if(mysqli_query($con,"INSERT INTO ".$master." VALUES (
 				 '',
 				 '$_POST[judul]',				 
                 '$content',				  				 
                 '$id_penulis',
                 '$now',
                 '$_POST[entrytime]',
                 '$nama_final',
                 '$_POST[tag]', 
                 '$_POST[video_link]',                    
                 '$_POST[thumbnail]',                                       
                 '$_POST[aktif]'
 				  ) ")
 		)
 	{
 		echo "succesfully inserted";
 	}
else{
	echo mysqli_error($con);
	echo "ada yang salah nih";	
}
 
 header("location:".$master."_view.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>