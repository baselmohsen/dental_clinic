<?php

require_once __DIR__."/../database/Prescription/database.php";

$id = $_GET['id'];

database_delete_prescription($id);
header("location: Prescriptions.php");

exit;


?>