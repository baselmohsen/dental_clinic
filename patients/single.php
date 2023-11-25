<?php

require_once __DIR__."/../database/patient/database.php";

$id = $_GET['id'];


$patient = database_get_patient($id);
$doctors=database_get_all_doctors();
$services=database_get_all_services();

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
  <br>
  <div class="container m-5 p-5">

  <table class="table table-dark">
  <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Address</th>
        <th scope="col">Birth date</th>
        <th scope="col">Gender</th>
        <th scope="col">Doctor Name</th>
        <th scope="col"> Appointment Date</th>
        <th scope="col"> Service</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <td><?= $patient['id'] ?></td>
  <td><?= $patient['name'] ?></td> 
  <td><?= $patient['phone'] ?></td>
  <td><?= $patient['address'] ?></td>
  <td><?= $patient['birth_date'] ?></td>
  <td><?= $patient['gender'] ?></td>

  <td>
<?php foreach($doctors as  $doctor){ ?>
  <?php if($doctor['id']==$patient['doctor_id']) echo $doctor['name']; ?>
       <?php } ?>
  </td>


  <td><?= $patient['appointment'] ?></td>
  <td>
<?php foreach($services as  $service){ ?>
  <?php if($service['id']==$patient['service_id']) echo $service['service']; ?>
       <?php } ?>
  </td>

    </tr>

    </tbody>
</table>




</div>  


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>