<?php

include "../inc/database_connection.php";

$roomid = $_GET['roomid'];

$messages = [];

$sql_messages = "SELECT * FROM message WHERE roomid = $roomid";
$rs_messages = mysqli_query($conn, $sql_messages);

for ($i =  1; $i <= mysqli_num_rows($rs_messages); $i++) {
    $message = mysqli_fetch_assoc($rs_messages);
    $messages[] = [$message['username'], $message['message']];
}

print_r(json_encode($messages));

?>