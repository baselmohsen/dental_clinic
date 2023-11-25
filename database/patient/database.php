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

// get all patients from the database

function database_get_all_patients(){

    $conn = database_connect();
    
    $result = mysqli_query($conn, 'select * from patients');
    
    $patients = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_close($conn);
    
    return $patients;
    
    }
 // get all_doctors 

    function database_get_all_doctors(){

      $conn = database_connect();
      
      $result = mysqli_query($conn, 'select * from doctors');
      
      $doctors = mysqli_fetch_all($result, MYSQLI_ASSOC);
      
      mysqli_close($conn);
      
      return $doctors;
      
      }

 // get a single patient

function database_get_patient($id){

    $conn = database_connect();
    
    $result = mysqli_query($conn, "select * from patients where id = $id");
    $patient = mysqli_fetch_assoc($result);
    
    mysqli_close($conn);
    
    return $patient;
    
    }  
    
    
    // add a new patient to database

function database_add_patient($name, $phone, $address,$birth_date,$gender,$doctor_id,$appointment,$service_id){

    $conn = database_connect();
    
    $stmt = mysqli_prepare($conn, '
    
    insert into patients(name, phone, address,birth_date,gender,doctor_id,appointment,service_id)
    
    values (?, ?, ?,?,?,?,?,?)
    
    ');
    
    mysqli_stmt_bind_param($stmt, 'sssssiss', $name, $phone, $address,$birth_date,$gender,$doctor_id,$appointment,$service_id);
    
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    
    mysqli_close($conn);
    
    }
    // delete a  patient from database

function database_delete_patient($id){

    $conn = database_connect();
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      // sql to delete a record
      $sql = "DELETE FROM patients WHERE id=$id";
      
      if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      
      $conn->close();
    
    }

    
    
function database_get_all_services(){

  $conn = database_connect();
  
  $result = mysqli_query($conn, 'select * from services');
  
  $services = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  mysqli_close($conn);
  
  return $services;
  
  }