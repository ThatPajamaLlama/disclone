<?php

session_start();
include "../inc/database_connection.php";

$username = $_SESSION['username'];
$text = $_POST['text'];
$roomid = $_POST['roomid'];
$timestamp = date("Y-m-d H:i");

$sql_sendMessage = "INSERT INTO message(roomid, username, message, timestamp) VALUES ($roomid, '$username', '$text', '$timestamp')";
$rs_sendMessage = mysqli_query($conn, $sql_sendMessage);

?>