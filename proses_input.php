<?php
require_once("database.php");
session_start();
$xnote =$_POST['notes'];
$id_user =$_SESSION['id_user'];
$simpan = inputdata("INSERT INTO note VALUES (null,now(),'$xnote',$id_user)");
if($simpan){
    header("location:notes.php");
}else{
    echo"gagal maemasukan data baru";
}
?>