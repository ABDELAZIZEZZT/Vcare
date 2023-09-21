<?php
// var_dump($_POST);
$id=$_POST['id'];
$status=$_POST['status'];

require "validation.php";
$val=new validation;
$data="status='$status'";
$val->updateDataDoctor("booking",$data,$id);
header("location:booking.php");
die;