
<?php

require_once __DIR__."/../database/assistants/database.php";
$name = "";
$phone = "";
$gender = "";
$salary = "";

$errormessage="";
if($_SERVER['REQUEST_METHOD']=='POST'){
  
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];
  $salary = $_POST['salary'];
  do{

    if(empty($name)||empty($phone)||empty($gender)||empty($salary)){
      $errormessage="all fields is required";
      break;
    }
    database_add_assistants($name,$phone,$gender,$salary);

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
        <h5>Add assistants</h5>
        <a class="btn btn-sm btn-primary" href="index.php"> back</a>
      </div>

<br>

  

      <div class="form-group">
        <label for="price"> Name </label>
        <input type="text" required name="name" class="form-control" id="service">
      </div>
      <div class="form-group">
        <label for="phone"> phone </label>
        <input type="text" required name="phone" class="form-control" id="phone">
      </div>

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
        <label for="salary">salary </label>
        <input type="text" required name="salary" class="form-control" id="salary">
      </div>


     <br>
      <div class="form-group">
      <input type="submit" name="add" class="btn btn-success" value="save">
      </div>
    
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>