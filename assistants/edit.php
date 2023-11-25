
<?php

require_once __DIR__."/../database/assistants/database.php";

$id=$_GET['id'];
$conn=database_connect();
if(isset($_POST['edit'])){
// read patient's data
$name = $_POST['name'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$salary = $_POST['salary'];
$sql="UPDATE `assistants` SET `name`='$name',`phone`='$phone',`gender`='$gender',`salary`='$salary' WHERE id=$id";
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
        <h4>Edit assistant</h4>
        <a class="btn btn-sm btn-primary" href="index.php"> back</a>
      </div>

      <?php
          $sql="select * from assistants where id=$id limit 1";
          $result=mysqli_query($conn,$sql);
          $assistants=mysqli_fetch_assoc($result);


      ?>

<br>
                <div class="form-group">
                  <label for="service">name:</label>
                  <input type="text" required name="name" value="<?php echo $assistants['name']?>" class="form-control" id="service">
                </div>
                <div class="form-group">
                  <label for="service">phone:</label>
                  <input type="text" required name="phone" value="<?php echo $assistants['phone']?>" class="form-control" id="service">
                </div>

          <div class="form-group">
            <label for="gender">Gender</label>:</label>
            <select name="gender" class="form-control"  required id="gender">
              <option value="" hidden selected disabled></option>
              <option value="male" <?php if($assistants['gender']=="male") echo "selected"; ?>>male</option>
              <option value="female" <?php if($assistants['gender']=="female") echo "selected"; ?>>female</option>
            </select>
          </div>
          

      <div class="form-group">
        <label for="appointment">salary </label>
        <input type="text" required name="salary" value="<?php echo $assistants['salary']?>" class="form-control" id="appointment">
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