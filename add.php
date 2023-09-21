<?php
require "DB.php";
$db=new DB;

if(isset($_POST['add']) ){
    $title=$_POST['title'];
    $image=$_POST['photo'];
    $db->insertData("majors","(titel,image)","('$title','$image')");
    header("location:./majors.php");
die;
}