
<?php

require_once __DIR__."/../database/Prescription/database.php";
$doctors=database_get_all_doctors();
$patients=database_get_all_patients();
$id=$_GET['id'];
$conn=database_connect();
if(isset($_POST['edit'])){

// read patient's data
$patient_id = $_POST['patient_id'];
$doctor_id = $_POST['doctor_id'];
$prescription = $_POST['prescription'];
$sql="UPDATE `prescriptions` SET `patient_id`='$patient_id',`doctor_id`='$doctor_id',`prescription`='$prescription' WHERE id=$id";
$result=mysqli_query($conn,$sql);


header("location:Prescriptions.php");

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
        <h4>Edit prescription</h4>
        <a class="btn btn-sm btn-primary" href="Prescriptions.php"> back</a>
      </div>

      <?php
          $sql="select * from prescriptions where id=$id limit 1";
          $result=mysqli_query($conn,$sql);
          $prescriptions=mysqli_fetch_assoc($result);


      ?>

<br>
      <div class="form-group">
      <label for="Doctor"> Which Doctor </label>:</label>
      <select  class="form-select"  name="doctor_id" required id="Doctor > 
      <option value=""  selected ></option>
      <?php foreach($doctors as  $doctor){ ?>
           <option value="<?php echo $doctor['id']?>"  <?php if($doctor['id']==$prescriptions['doctor_id']) echo 'selected'; ?>  ><?php echo $doctor['name'] ?></option> 
       <?php } ?>
      </select>
      </div>
<br>
      <div class="form-group">
      <label for="patient"> Which patient </label>:</label>
      <select  class="form-select"  name="patient_id" required id="patient > 
      <option value=""  selected ></option>
      <?php foreach($patients as  $patient){ ?>
           <option value="<?php echo $patient['id']?>"  <?php if($patient['id']==$prescriptions['patient_id']) echo 'selected'; ?>  ><?php echo $patient['name'] ?></option> 
       <?php } ?>
      </select>
      </div>
<br>
      <div class="form-group">
        <label for="appointment">Prescription </label>
        <input type="text" required name="prescription" value="<?php echo $prescriptions['prescription']?>" class="form-control" id="appointment">
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