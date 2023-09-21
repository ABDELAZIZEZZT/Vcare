<?php

session_start();

include 'validation.php';

$error_1=null;

$val=new validation;
if($val->checkRequestMethod("POST")&& $val->checkPostInput("email")){

    foreach($_POST as $key => $valu)
    {
        $$key=$val->sanitizeInput($valu);
    }

    if(!$val->searchInDB_email($email)){
        $error_1[]= "your email not required please register ";
        
    }

    if(!$val->searchInDB($email,$password)){
        $error_1[]= "wrong password ";
       
    }
   

}

//  var_dump($_SESSION['error']);
if(!empty($error_1)){
    $_SESSION['error'] = $error_1;
    var_dump($_SESSION['error']);
    //  header("location:login.php");
    // die;
    
}
else{
    $id=$_SESSION['id'];
    $user_data = $val->getById("users",$id);
    $role=$user_data[0]['role'];
    $_SESSION['role']=$role;
    // var_dump($role);
    header("location:./index.php");
    die;
   
}