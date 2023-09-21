<?php
require "validation.php";
$val=new validation;

$majors=$val->getAll("majors");
$titel=array();
// var_dump($majors);

foreach($majors as $key){
    foreach($key as $z=>$y)
    if($z=="titel")$titel[]=$y;
    
}
function sanitizeInput($input)
{
    return trim(htmlspecialchars(htmlentities($input)));
}
// var_dump($_POST);
    
foreach($_POST as $key => $valu)
{
    echo $valu."<br>";
    $$key=sanitizeInput($valu);
}
// var_dump($bio);



if(isset($_POST['delet'])){
    $id=$_POST['id'];
    $val->deleteData("doctors","$id");
    header("location:./doctors.php");
    die;
   
}else if(isset($_POST['update'])):?>
    <body>
    <form action="add_d.php" method="post">
            
            <label>name:</label>
            <input type="text"  name="name" value="<?php echo $name?>" required></input>
            <br>
            <br>        
            <label>photo</label>
            <input type="file" name="photo" required></input>
            <br>
            <br>
            <label>major:</label>
            <!-- <input type="major" name="major" required></input> -->
            <select name="major" value="<?php echo $major;?>" >
                <?php foreach($titel as $key):?>
                <option value="<?php echo $key;?>">
                <?php echo $key;?>
                </option>
                <?php endforeach?>
            </select>
            <br>
            <br>
            <label>bio:</label>
            <input type="text" name="bio" value="<?PHP echo $bio?>"></input>
            
            <br>

            <button name="update">update</button>
    </body>
<?php elseif(isset($_POST['add'])) :?>
    <body>
        <form action="add_d.php" method="post">
            
            <label>name:</label>
            <input type="text"  name="name" required></input>
            <br>
            <br>        
            <label>photo</label>
            <input type="file" name="photo" required></input>
            <br>
            <br>
            <label>email:</label>
            <input type="email" name="email" required></input>
            <br>
            <br>
            <label>password:</label>
            <input type="password" name="password" required></input>
            <br>
            <br>
            <label>major:</label>
            <!-- <input type="major" name="major" required></input> -->
            <select name="major" value="<?php echo $key;?>" >
                <?php foreach($titel as $key):?>
                <option value="<?php echo $key;?>">
                <?php echo $key;?>
                </option>
                <?php endforeach?>
            </select>
            <br>
            <br>
            <label>bio:</label>
            <input type="text" name="bio" ></input>
            
            <br>

            <button name="add">Add</button>

        </form>
    </body>
    <?php endif;?>
