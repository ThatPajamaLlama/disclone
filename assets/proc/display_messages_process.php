<?php

include "../inc/database_connection.php";

$roomid = $_GET['roomid'];

$messages = [];

$sql_messages = "SELECT * FROM message WHERE roomid = $roomid";
$rs_messages = mysqli_query($conn, $sql_messages);

for ($i =  1; $i <= mysqli_num_rows($rs_messages); $i++) {
    $message = mysqli_fetch_assoc($rs_messages);
    $timestamp = date_create($message['timestamp']);
    $messages[] = [$message['username'], $message['message'], date_format($timestamp, "d/m/y H:i")];
}

print_r(json_encode($messages));

?>