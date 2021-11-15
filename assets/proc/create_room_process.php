<?php

include "../inc/database_connection.php";

$previousURL = $_SERVER['HTTP_REFERER'];

$name = $_POST['new-room-name'];
$serverId = $_POST['server-id'];

$sql_newRoom = "INSERT INTO room(name, serverid) VALUES ('$name', '$serverId')";
$rs_newRoom = mysqli_query($conn, $sql_newRoom);

header('location: ' . $previousURL);

?>