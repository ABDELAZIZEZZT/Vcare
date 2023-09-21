<?php
// var_dump($_POST);

var_dump($_POST);
$id_=$_POST['id'];


$status=$_POST['status'];
if(isset($_POST['update'])):
  
?>
<form action="updateBooking.php" method="post">

    <select name="status" value="<?php echo $status ?>" >
              
        <option value="pending">
        pending        
        </option>
        <option value="accepted">
        accepted      
        </option>
        <option value="rejected">
        rejected      
        </option>
              
    </select>
    <input type="hidden" name="id" value="<?php echo $id_?>">
    <button>Update</button>
</form>
<?php else:
require "validation.php";
$val=new validation;
$val->deleteData("booking",$id_);
header("location:booking.php");
?>

<?php endif?>

