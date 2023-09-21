<?php
require "DB.php";
$db=new DB;
$data=$db->getAll("majors");
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

<form action="CRUD.php" method="post">
      <button type="submit" name="add" >Add New Major</button>
</form>

   
            <?php foreach ($data as $key=>$value) :?>
            <div class="card p-2" style="width: 12rem;">
            <form action="CRUD.php" method="post">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <img src="assets/images/majors/<?php $p=$value['image']; echo $p ;?>"  style=" width: 300px;height: auto;">
                        <h4 ><?php $z=$value['titel']; echo $z ;?> </h4>
                      
                        <br>
                        <button name="update">Update</button>
                        <br>
                        <button name="delet">delet</button>
                        <input type="hidden"  name="id" value="<?php $z=$value['id']; echo $z ;?>" >
                        <input type="hidden"  name="title" value="<?php $z=$value['titel']; echo $z ;?>" >

                    </div>
               
            </div>
      
</form>           
<?php endforeach?>
<a href="./dashbord.php" ><h1><-</h1></a>
</body>
</html>

