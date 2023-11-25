<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}



require_once __DIR__."/database/Appointments/database.php";

$Appointments = get_all_Appointments();
$i=1;
?>
<!DOCTYPE html>

<html>

<head>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DENTAL CLINIC </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/css.css">
<style>


</style>
</head>
<body>
<div class="topnav">
  <a class="active" href="#home"><i class="fa-solid fa-tooth fa-shake fa-2xl"></i> DENTAL CLINIC</a>
  <a href="doctors/index_doctor.php"><i class="fa-solid fa-user-doctor"></i> DOCTORS</a>
  <a href="assistants/index.php"><i class="fa-solid fa-user-nurse"></i> ASSISTANTS</a>
  <a href="patients/index.php"> <i class="fa-solid fa-hospital-user"></i> PATIENTS</a>
  <a href="Prescriptions/Prescriptions.php"><i class="fa-solid fa-prescription "></i> PRESCRIPTIONS</a>
  <a href="services/index.php"><i class="fa-solid fa-mobile-screen-button"></i> SERVICES</a>
  <!-- <a  href="userview.php?id=<?=11?>" ><i class="fa-solid fa-eye"></i> View case</a> -->
  <a  class="text-white ml-5 text-left bg-danger" href="logout.php" ><i class="fa-solid fa-right-from-bracket"></i> LOGOUT</a>
</div>



<h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
<div class="container m-3 p-2">
  <table class="table">
    <div class="d-flex justify-content-between mb-3">
    <h4>APPOINTMENTS </h4>
    </div>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Patient Name </th>
        <th scope="col">Doctor Name </th>
        <th scope="col">Appointment</th>
      
      </tr>
    </thead>
    <tbody>
  
    <?php foreach($Appointments as $Appointment): ?>
  
  <tr>
  
  <td><?php echo $i; ?></td>
  <td><?= $Appointment['pname'] ?></td>
  <td><?= $Appointment['name'] ?></td>
  <td><?= $Appointment['appointment'] ?></td>

</tr>
  <?php $i++;?>
  <?php endforeach ?>

    </tbody>
  </table>
</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</body>
</html>