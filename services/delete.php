<?php

require_once __DIR__."/../database/services/database.php";

$id = $_GET['id'];

database_delete_services($id);
header("location: index.php");

exit;


?>