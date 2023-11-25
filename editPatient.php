
<?php

require_once __DIR__."/database/patient/database.php";
$doctors=database_get_all_doctors();
$services=database_get_all_services();

$id=$_GET['id'];
$conn=database_connect();
if(isset($_POST['edit'])){

// read patient's data
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$birth_date = $_POST['birth_date'];
$gender = $_POST['gender'];
$doctor_id = $_POST['doctor_id'];
$service_id = $_POST['service_id'];
$appointment = $_POST['appointment'];
$sql="UPDATE `patients` SET `name`='$name',`phone`='$phone',`address`='$address',`birth_date`='$birth_date' ,`gender`='$gender',`doctor_id`='$doctor_id',`appointment`='$appointment',`service_id`='$service_id' WHERE id=$id";
$result=mysqli_query($conn,$sql);


header("location: user_home.php");

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
        <h5>edit </h5>
        <a class="btn btn-sm btn-primary" href="user_home.php"> back</a>
      </div>

      <?php
          $sql="select * from patients where id=$id limit 1";
          $result=mysqli_query($conn,$sql);
          $patient=mysqli_fetch_assoc($result);


      ?>
      <div class="form-group">
        <label for="name">name:</label>
        <input type="text" required name="name" value="<?php echo $patient['name']?>" class="form-control" id="name">
      </div>
      <div class="form-group">
        <label for="phone">phone:</label>
        <input type="text" required name="phone" value="<?php echo $patient['phone']?>" class="form-control" id="phone">
      </div>
      <div class="form-group">
        <label for="address">address:</label>
        <input type="text" required name="address" value="<?php echo $patient['address']?>" class="form-control" id="address">
      </div>
      <div class="form-group">
        <label for="birth_date">Birth date:</label>
        <input type="date" required name="birth_date" value="<?php echo $patient['birth_date']?>"  class="form-control" id="birth_date">
      </div>
      <br>
      <div class="form-group">
        <label for="gender">Gender</label>:</label>
        <select name="gender" class="form-control"  required id="gender">
          <option value="" hidden selected disabled></option>
          <option value="male" <?php if($patient['gender']=="male") echo "selected"; ?>>male</option>
          <option value="female" <?php if($patient['gender']=="female") echo "selected"; ?>>female</option>
        </select>
      </div>
<br>
      <div class="form-group">
      <label for="Doctor"> Which Doctor </label>:</label>
      <select  class="form-select"  name="doctor_id" required id="Doctor > 
      <option value=""  selected ></option>
      <?php foreach($doctors as  $doctor){ ?>
           <option value="<?php echo $doctor['id']?>"  <?php if($doctor['id']==$patient['doctor_id']) echo 'selected'; ?>  ><?php echo $doctor['name'] ?></option> 
       <?php } ?>
      </select>
      </div>
<br>
      <div class="form-group">
        <label for="appointment">Appointment Date:</label>
        <input type="date" required name="appointment" value="<?php echo $patient['appointment']?>" class="form-control" id="appointment">
      </div>
<br>
      <div class="form-group">
      <label for="service"> Which services </label>:</label>
      <select  class="form-select"  name="service_id" required id="service > 
      <option value=""  selected ></option>
      <?php foreach($services as  $service){ ?>
           <option value="<?php echo $service['id']?>"  <?php if($service['id']==$patient['service_id']) echo 'selected'; ?>  ><?php echo $service['service'] ?></option> 
       <?php } ?>
      </select>
      </div>
      
     <br>
      <div class="form-group">
      <button type="submit" name="edit" class="btn btn-success">save </button>
      <!-- <input type="submit" name="edit" class="btn btn-success" value="edit_patient "> -->
      </div>
    
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>