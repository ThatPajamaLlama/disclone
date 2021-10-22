<?php

include "../inc/database_connection.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql_login = "SELECT password FROM user WHERE username='$username'";


?>