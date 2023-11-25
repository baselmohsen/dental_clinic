<?php

require_once __DIR__."/../database/assistants/database.php";

$id = $_GET['id'];

database_delete_assistants($id);
header("location: index.php");

exit;


?>