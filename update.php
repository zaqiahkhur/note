<?php
 require_once("database.php");
 $id=$_POST['id'];
 $xnote = $_POST['notes'];

 $sql2=updatedata("notes",$xnote,$id);
 if ($sql2) {
    header("location:notes.php");
 }
?>