<?php

// Database connection parameters

define('HOSTNAME', 'localhost');

define('USERNAME', 'root');

define('PASSWORD', '');

define('DATABASE', 'dental_clinic');

// connect to database

function database_connect(){

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

return $conn;

}

// get all doctors from the database

function database_get_all_doctors(){

    $conn = database_connect();
    
    $result = mysqli_query($conn, 'select * from doctors');
    
    $doctors = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_close($conn);
    
    return $doctors;
    
    }

 // get a single doctor

function database_get_doctor($id){

    $conn = database_connect();
    
    $result = mysqli_query($conn, "select * from doctors where id = $id");
    
    $doctor = mysqli_fetch_assoc($result);
    
    mysqli_close($conn);
    
    return $doctor;
    
    }  
    
    
    // add a new doctor to database

function database_add_doctor($name, $phone, $address,$salary,$new_img_name,$assistant_id){

    $conn = database_connect();
    
    $stmt = mysqli_prepare($conn, '
    
    insert into doctors(name, phone, address,salary,image_url,assistant_id)
    
    values (?, ?, ?,?,?,?)
    
    ');
    
    mysqli_stmt_bind_param($stmt, 'ssssss', $name, $phone, $address,$salary,$new_img_name,$assistant_id);
    
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    
    mysqli_close($conn);
    
    }
    // delete a  doctor from database

function database_delete_doctor($id){

    $conn = database_connect();
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      // sql to delete a record
      $sql = "DELETE FROM doctors WHERE id=$id";
      
      if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      
      $conn->close();
    
    }

    

    function database_get_all_assistants(){

      $conn = database_connect();
      
      $result = mysqli_query($conn, 'select * from assistants');
      
      $assistants = mysqli_fetch_all($result, MYSQLI_ASSOC);
      
      mysqli_close($conn);
      
      return $assistants;
      
      }
  

      
      ?>
      