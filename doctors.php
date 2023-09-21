<?php
require "DB.php";
$db=new DB;
$data=$db->getAll("doctors");
// var_dump($_POST);
// var_dump($data);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="CRUD_d.php" method="post">
      <button type="submit" name="add" >Add New doctor</button>
</form>

   
<form action="CRUD_d.php" method="post">
            <?php 
            $majors=$db->getAll("majors");
            $title=0;
            foreach ($data as $key=>$value) :
            foreach($majors as $k ){
                // var_dump($key);
                foreach($k as $z=>$y){
                   
                    
                   if($z=="id"&& $y==$value['major_id'])$title=$k["titel"];
                }
            }?>
            <div class="card p-2" style="width: 12rem;">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <img src="assets/images/doctors/<?php echo $value['image'];?>"  style=" width: 300px;height: auto;">
                        <h4 ><?php $z=$value['name']; echo $z ;?> </h4>
                        <h4 ><?php echo $title ;?> </h4>

                        <h3 ><?php echo $value['bio']; ?> </h3>
                        <!-- <a href="./doctors/index.html" class="btn btn-outline-primary card-button">Browse Doctors</a> -->
                        <br>
                        <button name="update">Update</button>
                        <br>
                        <button name="delet">delet</button>
                        <input type="hidden"  name="id" value="<?php $z=$value['id']; echo $z ;?>" >
                        <input type="hidden"  name="name" value="<?php $z=$value['name']; echo $z ;?>" >
                        <input type="hidden"  name="bio" value="<?php $z=$value['bio']; echo $z ;?>" >

                    </div>
               
            </div>
      
            <?php endforeach?>
</form>           
<a href="./dashbord.php" ><h1><-</h1></a>
</body>
</html>

