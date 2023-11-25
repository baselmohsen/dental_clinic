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

function database_get_all_doctors(){

    $conn = database_connect();
    
    $result = mysqli_query($conn, 'select * from doctors');
    
    $doctors = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_close($conn);
    
    return $doctors;
    
    }

    function database_get_all_patients(){

        $conn = database_connect();
        
        $result = mysqli_query($conn, 'select * from patients');
        
        $patients = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        mysqli_close($conn);
        
        return $patients;
        
        }

function get_Prescriptions(){

    $conn = database_connect();
    
    $result = mysqli_query($conn,'select * from prescriptions');
    
    $prescriptions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_close($conn);
    
    return $prescriptions;

}


function database_add_Prescriptions($patient_id,$doctor_id,$prescription){

    $conn = database_connect();
    
    $stmt = mysqli_prepare($conn, '
    
    insert into prescriptions(patient_id, doctor_id, prescription)
    
    values (?, ?, ?)
    
    ');
    
    mysqli_stmt_bind_param($stmt, 'sss', $patient_id, $doctor_id, $prescription);
    
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    
    mysqli_close($conn);
    
    }
    // delete a  doctor from database

function database_delete_prescription($id){

    $conn = database_connect();
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      // sql to delete a record
      $sql = "DELETE FROM prescriptions WHERE id=$id";
      
      if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      
      $conn->close();
    
    }

    function database_get_patient($id){

      $conn = database_connect();
      
      $result = mysqli_query($conn, "select * from patients where id = $id");
      $patient = mysqli_fetch_assoc($result);
      
      mysqli_close($conn);
      
      return $patient;
      
      }  












?>