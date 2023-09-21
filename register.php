<?php
include 'validation.php';



$errors=[];
$val=new validation;


if($val->checkRequestMethod("POST")&& $val->checkPostInput("name")){

    foreach($_POST as $key => $valu)
    {
        $$key=$val->sanitizeInput($valu);
    }


    if(!$val->requiredVal($name)){
        $errors[]= "name isuired ";
    }else if(!$val->minVal($name,4)){
        $errors[]= "name mae greater than 4 chars";
    }else if(!$val->maxVal($name,25)){
        $errors[]= "name mast be smaller than 12 chars";
    }

    if(!$val->validUserName($name)){
        $errors[]= "this user name not valid ";
    }



    if(!$val->requiredVal($email)){
        $errors[]= "email is required ";
    }else if(!$val->emailVal($email)){
        $errors[]= "plase typa valid email";
    }
    if(!$val->validUserEmail($email)){
        $errors[]= "this email not valid becase it used";
    }



    if(!$val->requiredVal($password)){
        $errors[]= "password is required ";
    }else if(!$val->minVal($password,6)){
        $errors[]= "password mast be greater than 6 chars";
    }else if(!$val->maxVal($password,25)){
        $errors[]= "password mast be smaller than 12 chars";
    }
   




    // if(!$val->requiredVal($confirm_password)){
    //     $errors[]= "confirm password is required ";
    // }
    // if(!$val->checkComfirm_Password($confirm_password,$password)){
    //     $errors[]= "confirm password mast be si,milar to password";
    // }


  




   if(!empty($errors)){
   
    $_SESSION['errors'] = $errors;

    // header("location:register.html");
    var_dump($errors);
    die;

   }
   else{
   
    $users = $val->getAll("users");
    if ($users == NULL) {
        
        $password_hashed=password_hash($password, PASSWORD_BCRYPT);
        $columns="(name , email , password , phone )";
        $data="('$name', '$email', '$password_hashed','$phone')";
       
        $val->insertData("users",$columns,$data); 
        $_SESSION['id'] = 1;
      
        
    } else {

        $password_hashed=password_hash($password, PASSWORD_BCRYPT);
      
        $password_hashed=password_hash($password, PASSWORD_BCRYPT);
        $columns="(name , email , password , phone )";
        $data="('$name', '$email', '$password_hashed','$phone')";
       
        $val->insertData("users",$columns,$data); 
       
        // $val->insertData("users","name, email, password","'$username', '$email', '$password_hashed'"); 
    }
   
      header("location:./login.html");
      die;
   
   }
   
    

   
}
else{
    echo "not supported method<br>";
}