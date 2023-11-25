<?php

require_once __DIR__."/../database/Prescription/database.php";
$Prescriptions = get_Prescriptions();
$doctors=database_get_all_doctors();
$patients=database_get_all_patients();
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

<title>Dental Clinic</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
<br>
 
<div class="container m-5 p-5">
<div class="form-control mb-2">
  <a href="../home.php" class="btn btn-dark">home</a>

 </div>


  <table class="table">
  <div class="d-flex justify-content-between mb-3">
    <h4>PRESCRIPTIONS </h4>
    <a class="btn btn-primary" href="add.php"><i class="fa-solid fa-plus"></i> add prescription</a>
    </div>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Patient Name </th>
        <th scope="col">Doctor Name </th>
        <th scope="col">Prescription</th>
        <th scope="col">Actions</th>
      
      </tr>
    </thead>
    <tbody>
    <?php foreach($Prescriptions as $Prescription): ?>
  
  <tr>
  
      <!-- <td><?= $Prescription['id'] ?></td> -->
      <td><?php echo $i; ?></td>

      <td>
      <?php foreach($doctors as  $doctor){ ?>
      <?php if($doctor['id']==$Prescription['doctor_id']) echo $doctor['name']; ?>
          <?php } ?>
      </td>
      <td>
      <?php foreach($patients as  $patient){ ?>
      <?php if($patient['id']==$Prescription['patient_id']) echo $patient['name']; ?>
          <?php } ?>
      </td>
      <td><?= $Prescription['prescription'] ?></td>
      <!-- <td><a  href="../userview.php?id=<?= $patient['id'] ?>" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i> View case</a></td> -->

    <td>
      <a  href="delete.php?id=<?= $Prescription['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
      <a  href="edit.php?id=<?= $Prescription['id'] ?>" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
    
    </td>
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
