
<?php

require_once __DIR__."/../database/services/database.php";

$id=$_GET['id'];
$conn=database_connect();
if(isset($_POST['edit'])){

// read patient's data
$service = $_POST['service'];
$price = $_POST['price'];
$sql="UPDATE `services` SET `service`='$service',`price`='$price' WHERE id=$id";
$result=mysqli_query($conn,$sql);


header("location:index.php");

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
        <h4>Edit service</h4>
        <a class="btn btn-sm btn-primary" href="index.php"> back</a>
      </div>

      <?php
          $sql="select * from services where id=$id limit 1";
          $result=mysqli_query($conn,$sql);
          $services=mysqli_fetch_assoc($result);


      ?>

<br>
                <div class="form-group">
                  <label for="service">service:</label>
                  <input type="text" required name="service" value="<?php echo $services['service']?>" class="form-control" id="service">
                </div>

<br>
      <div class="form-group">
        <label for="appointment">price </label>
        <input type="text" required name="price" value="<?php echo $services['price']?>" class="form-control" id="appointment">
      </div>
      
     <br>
      <div class="form-group">
      <button type="submit" name="edit" class="btn btn-success">edit </button>
      </div>
    
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>