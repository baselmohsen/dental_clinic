<?php

require_once __DIR__."/../database/database.php";

$id = $_GET['id'];

database_delete_doctor($id);
header("location: index_doctor.php");

exit;


?>