<?php

session_start();
include "../inc/database_connection.php";

$username = $_SESSION['username'];
$text = $_POST['text'];
$roomid = $_POST['roomid'];

$sql_sendMessage = "INSERT INTO message(roomid, username, message) VALUES ($roomid, '$username', '$text')";
$rs_sendMessage = mysqli_query($conn, $sql_sendMessage);

?>