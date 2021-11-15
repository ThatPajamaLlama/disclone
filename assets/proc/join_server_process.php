<?php

include "../inc/database_connection.php";
session_start();

$previousURL = $_SERVER['HTTP_REFERER'];

$serverCode = $_POST['server-code'];
$username = $_SESSION['username'];

$sql_joinServer = "INSERT INTO membership(serverid, username) VALUES ('$serverCode', '$username')";
$rs_joinServer = mysqli_query($conn, $sql_joinServer);

header('location: ' . $previousURL);

?>