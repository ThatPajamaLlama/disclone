<?php

session_start();
$username = $_SESSION['username'];

$text = $_POST['text'];

$sql_sendMessage = "INSERT INTO messages "

?>