<?php
require "db_config.php";
$id = $_GET['id']; // get id through query string

$del = mysqli_query($conn_db,"DELETE FROM users WHERE user_log_id = '$id'"); // delete query

if($del)
{
    mysqli_close($conn_db); // Close connection
    header("location: ../index.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>