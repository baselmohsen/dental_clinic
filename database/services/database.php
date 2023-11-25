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

function database_get_all_services(){

    $conn = database_connect();
    
    $result = mysqli_query($conn, 'select * from services');
    
    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_close($conn);
    
    return $services;
    
    }




function database_add_services($service,$price){

    $conn = database_connect();
    
    $stmt = mysqli_prepare($conn, '
    
    insert into services(service,price)
    
    values (?, ?)
    
    ');
    
    mysqli_stmt_bind_param($stmt, 'ss', $service,$price);
    
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    
    mysqli_close($conn);
    
    }
    // delete a  doctor from database

function database_delete_services($id){

    $conn = database_connect();
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      // sql to delete a record
      $sql = "DELETE FROM services WHERE id=$id";
      
      if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      
      $conn->close();
    
    }


?>