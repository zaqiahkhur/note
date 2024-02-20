<?php
require_once('database.php');
$id =$_GET ['id'];
$data= delete('note',$id);
if($data){
    header("location:notes.php");
}

?>