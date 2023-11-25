
<?php

require_once __DIR__."/../database/patient/database.php";
$doctors=database_get_all_doctors();
$services=database_get_all_services();
$name ="";
$phone ="";
$address = "";
$birth_date = "";
$gender = "";
$doctor_id = "";
$service_id = "";
$appointment = "";

$errormessage="";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $birth_date = $_POST['birth_date'];
  $gender = $_POST['gender'];
  $doctor_id = $_POST['doctor_id'];
  $service_id = $_POST['service_id'];
  $appointment = $_POST['appointment'];
  do{

    if(empty($name)||empty($phone)||empty($address)||empty($birth_date)||empty($gender)||empty($doctor_id)||empty($appointment)){
      $errormessage="all fields is required";
      break;
    }
    database_add_patient($name, $phone, $address,$birth_date,$gender,$doctor_id,$appointment,$service_id);

  // redirect to index page

     header("location: index.php");

     exit;

  }while(false);

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
        <h5>Add patients</h5>
        <a class="btn btn-sm btn-primary" href="index.php"> back</a>
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" required name="name" class="form-control" id="name">
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" required name="phone" class="form-control" id="phone">
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" required name="address" class="form-control" id="address">
      </div>
      <div class="form-group">
        <label for="birth_date">Birth date:</label>
        <input type="date" required name="birth_date" class="form-control" id="birth_date">
      </div>
      <br>
      <div class="form-group">
        <label for="Gender">Gender</label>:</label>
        <select class="form-select"  name="gender" required id="Gender">
          <option value="" hidden selected disabled>--select gender--</option>
          <option value="male">male</option>
          <option value="female">female</option>
        </select>
      </div>
<br>

      <div class="form-group">
      <label for="Doctor"> Which Doctor </label>:</label>
      <select class="form-select"  name="doctor_id" required id="Doctor > 
      <option value=""  selected ></option>
      <?php foreach($doctors as  $doctor){ ?>
           <option value="<?php echo $doctor['id']?>"><?php echo $doctor['name'] ?></option> 
       <?php } ?>
      </select>
      </div>
<br>
    <div class="form-group">
      <label for="service"> Which service </label>:</label>
      <select class="form-select"  name="service_id" required id="service > 
      <option value=""  selected ></option>
      <?php foreach($services as  $service){ ?>
           <option value="<?php echo $service['id']?>"><?php echo $service['service'] ?></option> 
       <?php } ?>
      </select>
      </div>
        <br>
      <div class="form-group">
        <label for="appointment">Appointment Date:</label>
        <input type="date" required name="appointment" class="form-control" id="appointment">
      </div>


     <br>
      <div class="form-group">
      <!-- <button type="submit" name="add_doctor" class="btn btn-success">add doctor</button> -->
      <input type="submit" name="add_patient" class="btn btn-success" value="add patient">
      </div>
    
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>