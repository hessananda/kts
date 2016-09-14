<?php

include "config/koneksi.php";
include "config/form_maker.php";
session_start();

$master = 'modul' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
    $id=$_GET['id'];
}

if ($action=='hapus')
{
    delete_file('image',$master,'../images/modul','id',$id);
    delete_file('file',$master,'../modul','id',$id);
    $query = mysqli_query($con,"DELETE FROM ".$master." WHERE id = '$id'"); 
    echo mysqli_error($con);
    header("location:".$master."_view.php");                
}

elseif ($action=='edit')
{
    $query = "UPDATE ".$master." SET 
             title = '$_POST[judul]',                                
             aktif = '$_POST[aktif]'
             WHERE id = '$id'";

    mysqli_query($con,$query);

    if ($_FILES['image']['name'] <> '')
        {
            upload_file('../images/modul','image');
            delete_file('image',$master,'../images/modul','id',$id) ;   
            mysqli_query($con,"UPDATE ".$master." SET image = '$nama_final' WHERE id = '$id' ");
        }

     if ($_FILES['file']['name'] <> '')
        {
            upload_file('../modul','file');
            delete_file('file',$master,'../modul','id',$id) ;   
            mysqli_query($con,"UPDATE ".$master." SET file = '$nama_final' WHERE id = '$id' ");
        }

    echo mysqli_error($con);
    header("location:".$master."_edit.php?id=$id");
}

elseif ($action=='input')
{

    $loc=$_FILES["file"]['tmp_name'];
    $acak = rand(10000,99999);
    $nama = $_FILES["file"]['name'];
    $nama_final_1 = $acak.$nama;
    $path="../modul/".$nama_final_1;
    $hai = move_uploaded_file($loc,$path);

    upload_file('../images/modul','image');    

    mysqli_query($con,"INSERT INTO ".$master." VALUES (
                 '',
                 '$_POST[judul]',                 
                 '$now',
                 '$nama_final',                 
                 '$nama_final_1',                 
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