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

function get_all_Appointments(){

    $conn = database_connect();
    
    $result = mysqli_query($conn,

        "SELECT patients.name as pname,patients.appointment as appointment, doctors.name 
         FROM patients,doctors
        where patients.doctor_id=doctors.id"
    
    );
    
    $Appointments = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_close($conn);
    
    return $Appointments;

}

?>