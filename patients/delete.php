<?php

require_once __DIR__."/../database/patient/database.php";

$id = $_GET['id'];

database_delete_patient($id);
header("location: index.php");

exit;


?>