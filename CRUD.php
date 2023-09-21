<?php
require "validation.php";
$val=new validation;



if(isset($_POST['delet'])){
    $id=$_POST['id'];
    $val->deleteData("majors","$id");
    header("location:./majors.php");
    die;
   
}else if(isset($_POST['update'])):?>
    <body>
        <form action="update.php" method="post">
            <label>title:</label>
           <?php $id=$_POST['id'];?>
           <?php $title=$_POST['title'];?>
            <input type="text" value="<?php echo"$title" ?>" name="title"></input>
            <input type="file" name="photo" ></input>
            <input type="hidden" name="id" value="<?php echo $id ?>" ></input>

            <button name="update">update</button>

        </form>
    </body>
<?php elseif(isset($_POST['add'])) :?>
    <body>
        <form action="add.php" method="post">
            <label>title:</label>

            <input type="text"  name="title"></input>
            <input type="file" name="photo" ></input>
            <button name="add">Add</button>

        </form>
    </body>
    <?php endif;?>
