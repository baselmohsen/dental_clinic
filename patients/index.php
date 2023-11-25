<?php

require_once __DIR__."/../database/patient/database.php";

$patients = database_get_all_patients();
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
    <h4>PATIENTS </h4>
    <a  class="btn btn-primary" href="add.php"><i class="fa-solid fa-plus"></i> add patient</a>
    </div>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <!-- <th scope="col">Address</th>
        <th scope="col">birth date</th> -->
        <th scope="col">gender</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($patients as $patient): ?>
  
  <tr>
  
  <!-- <td><?= $patient['id'] ?></td> -->
  <td><?php echo $i; ?></td>
  <td><?= $patient['name'] ?></td>
  
  <td><?= $patient['phone'] ?></td>
  <!-- <td><?= $patient['address'] ?></td>
  
  
  <td><?= $patient['birth_date'] ?></td> -->
  <td><?= $patient['gender'] ?></td>
  <td>
    <a  href="single.php?id=<?= $patient['id'] ?>" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i> View</a>
  
    <a  href="delete.php?id=<?= $patient['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
    <a  href="edit.php?id=<?= $patient['id'] ?>" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
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
