

<?php
 require "validation.php";
 $val=new validation;
 $data=$val->getAll("booking");

 function sanitizeInput($input)
   {
      return trim(htmlspecialchars(htmlentities($input)));
   }




 foreach($data as  $key):
   foreach($key as $z=>$y):
      echo $z ." : ". $y."<br>";
      $$z=sanitizeInput($y);
?>
<?php endforeach?>
   <form action="booking_c.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id ?>" >
      <input type="hidden" name="status" value="<?php echo $status?>">
      <button name="delet">Delet</button>
      <button name="update">Update</button><br>
   </form>
   <?php endforeach?>
   <br> 
<h1><a href="./dashbord.php"><-</a></h1>




    
 
