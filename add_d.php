<?php
require "validation.php";
$val=new validation;
function sanitizeInput($input)
{
    return trim(htmlspecialchars(htmlentities($input)));
}
var_dump($_POST);

foreach($_POST as $key => $valu)
{
    $$key=sanitizeInput($valu);
}

$data=$val->getAll("majors");
$id;
foreach($data as $key ){
    foreach($key as $z=>$y){
       if($z=="titel"&& $y==$major)$id=$key["id"];
    }
}
$val->insertData("doctors","(name,email,password,image,bio,major_id)","('$name','$email','$password','$photo','$bio','$id')");
header("location:./doctors.php");
