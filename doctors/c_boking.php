<?php

function sanitizeInput($input)
{
    return trim(htmlspecialchars(htmlentities($input)));
}
// var_dump($_POST);
    
foreach($_POST as $key => $valu)
{
   
    $$key=sanitizeInput($valu);
}
require "../validation.php";
$val=new validation;
$data=$val->getAll("booking");
if($data==null):

    $id_b=1;
    $val->insertData("booking","(id,name,email,phone,doctor_id)","('$id_b','$name','$email','$phone','$id')");
    
   ?>
      <a href="./index.php"  doctors/index.php" class="link text-white">Doctors</a>
<?php
else:
    $val->insertData("booking","(name,email,phone,doctor_id)","('$name','$email','$phone','$id')");
    ?>
    <h1>sucsess</h1>
    <a href="./index.php"  doctors/index.php" class="link text-white">Doctors</a>
    <?php endif ?>


