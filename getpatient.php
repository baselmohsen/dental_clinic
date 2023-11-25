
<?php

function database_get_patient($id,$name){

$conn =$conn = mysqli_connect('localhost','root','','dental_clinic');


$result = mysqli_query($conn, "select * from patients where id = $id and name=$name");
$patient = mysqli_fetch_assoc($result);

mysqli_close($conn);

return $patient;

}  