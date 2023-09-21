<?php

 if(isset($_POST['update'])){
    $title=$_POST['title'];
    $image=$_POST['photo'];
    $d=array("title"->$title,"image"->$image);
    $db->updateData("majors",$d,$_POST['id']);
    header("location:./majors.php");
die;
}