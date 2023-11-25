<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

$id=$_SESSION['user_id'];
require_once __DIR__."/database/Prescription/database.php";
$Prescriptions = get_Prescriptions();


  $patient = database_get_patient($id);

$doctors=database_get_all_doctors();

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
  <a href="doctors.php"><i class="fa-solid fa-user-doctor"></i> DOCTORS</a>
  <a href="services.php"><i class="fa-solid fa-mobile-screen-button"></i> SERVICES</a>
  <a href="addpatient.php?id=<?=$_SESSION['user_id']?>"> <i class="fa-solid fa-hospital-user"></i> make Reservation </a>
  <a  class="text-white ml-5 text-left bg-danger" href="logout.php" ><i class="fa-solid fa-right-from-bracket"></i> LOGOUT</a>
</div>

  <table class="table table-light">
  <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Patient Name</th>  
        <th scope="col">Doctor Name</th>
        <th scope="col"> Appointment Date</th>
        <th scope="col">Prescription</th>
        <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>

    <td><?php if(isset($patient['id'])){
      echo $patient['id'];
    } else{
      echo "";
    }
    ?></td>

    <td><?php if(isset($patient['name'])){
      echo $patient['name'];
    } else{
      echo "";
    }
    ?></td>

<td>

<?php if(isset($patient['doctor_id'])){?>
  
  <?php foreach($doctors as  $doctor){ ?>
    <?php if($doctor['id']==$patient['doctor_id']) echo $doctor['name']; ?>
         <?php }
   
  }else{
    echo "";
}?>

</td>
<td><?php if(isset($patient['appointment'])){
      echo $patient['appointment'];
    } else{
      echo "";
    }
    ?></td>


<td>

<?php if(isset($patient['id'])){?>
  
  <?php foreach($Prescriptions as  $Prescription){ ?>
    <?php if($patient['id']==$Prescription['patient_id']) echo $Prescription['prescription']; ?>
         <?php }
   
  }else{
    echo "";
}?>

</td> 
<td>
<a  href="editPatient.php?id=<?= $patient['id'] ?>" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

</td>


    </tr>

    </tbody>
</table>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</body>
</html>