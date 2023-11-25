
<?php

require_once __DIR__."/../database/database.php";
$assistants=database_get_all_assistants();

$id=$_GET['id'];
$conn=database_connect();
if(isset($_POST['edit'])){

// read patient's data
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$salary = $_POST['salary'];
$assistant_id = $_POST['assistant_id'];



$sql="UPDATE `doctors` SET `name`='$name',`phone`='$phone',`address`='$address',`salary`='$salary',`assistant_id`='$assistant_id' WHERE id=$id";
$result=mysqli_query($conn,$sql);


header("location: index_doctor.php");

exit;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dental Clinic</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>

      
    <div class="container m-5 p-5">

    <form  method="post">

    <div class="d-flex justify-content-between mb-3">
        <h5>edit doctors</h5>
        <a class="btn btn-sm btn-primary" href="index_doctor.php"> back</a>
      </div>

      <?php
          $sql="select * from doctors where id=$id limit 1";
          $result=mysqli_query($conn,$sql);
          $doctor=mysqli_fetch_assoc($result);


      ?>
      <div class="form-group">
        <label for="name">name:</label>
        <input type="text" required name="name" value="<?php echo $doctor['name']?>" class="form-control" id="name">
      </div>
      <div class="form-group">
        <label for="phone">phone:</label>
        <input type="text" required name="phone" value="<?php echo $doctor['phone']?>" class="form-control" id="phone">
      </div>
      <div class="form-group">
        <label for="address">address:</label>
        <input type="text" required name="address" value="<?php echo $doctor['address']?>" class="form-control" id="address">
      </div>
      <div class="form-group">
        <label for="salary">salary:</label>
        <input type="text" required name="salary" value="<?php echo $doctor['salary']?>" class="form-control" id="salary">
      </div>

      <div class="form-group">
      <label for="Doctor"> Which assistants </label>:</label>
      <select  class="form-select"  name="assistant_id" required id="Doctor > 
      <option value=""  selected ></option>
      <?php foreach($assistants as  $assistant){ ?>
           <option value="<?php echo $assistant['id']?>"  <?php if($assistant['id']==$doctor['assistant_id']) echo 'selected'; ?>  ><?php echo $assistant['name'] ?></option> 
       <?php } ?>
      </select>
      </div>
     <br>
      <div class="form-group">
      <button type="submit" name="edit" class="btn btn-success">edit doctor</button>
      <!-- <input type="submit" name="edit" class="btn btn-success" value="edit_doctor "> -->
      </div>
    
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>