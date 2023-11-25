
<?php

require_once __DIR__."/../database/database.php";
$assistants=database_get_all_assistants();

$name ="";
$phone ="";
$address = "";
$salary = "";
$assistant_id = "";
$my_image = "";

$errormessage="";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $name = $_POST['name'];

  $phone = $_POST['phone'];
  
  $address = $_POST['address'];
  $salary = $_POST['salary'];
 $assistant_id = $_POST['assistant_id'];

  $img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

		if ($img_size > 5242880) {
			$em = "Sorry, your file is too large.";
		    header("Location: index_doctor.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-",true ).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

			
			}
		}
	}




  do{

    if(empty($name)||empty($phone)||empty($address)||empty($salary)||empty($assistant_id)){
      $errormessage="all fields is required";
      break;
    }
    database_add_doctor($name, $phone, $address,$salary,$new_img_name,$assistant_id);

  // redirect to index page

     header("location: index_doctor.php");

     exit;

  }while(false);

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

    <form  method="post" enctype="multipart/form-data">

    <div class="d-flex justify-content-between mb-3">
        <h5>Add Doctors</h5>
        <a class="btn btn-sm btn-primary" href="index_doctor.php"> back</a>
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
        <label for="salary">Salary:</label>
        <input type="text" required name="salary" class="form-control" id="salary">
      </div>
      <div class="form-group">
        <label for="image">image:</label>
        <input type="file" required name="my_image" class="form-control" id="image">
      </div>

      <div class="form-group">
      <label for="assistant"> Which Assistant </label>:</label>
      <select class="form-select"  name="assistant_id" required id="assistant > 
      <option value=""  selected ></option>
      <?php foreach($assistants as  $assistant){ ?>
           <option value="<?php echo $assistant['id']?>"><?php echo $assistant['name'] ?></option> 
       <?php } ?>
      </select>
      </div>
     <br>
      <div class="form-group">
      <!-- <button type="submit" name="add_doctor" class="btn btn-success">add doctor</button> -->
      <input type="submit" name="add_doctor" class="btn btn-success" value="Add doctor">
      </div>
    
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>