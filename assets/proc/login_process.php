<?php

include "../inc/database_connection.php";

$username = $_POST['username'];
$username = mysqli_real_escape_string($conn, $username);

$password = $_POST['password'];

$sql_login = "SELECT * FROM user WHERE username='$username'";
$rs_login = mysqli_query($conn, $sql_login);

if (mysqli_num_rows($rs_login) == 1) {
    $details = mysqli_fetch_assoc($rs_login);
    if (password_verify($password, $details['password'])) {
        session_start();
        $_SESSION['username'] = $details['username'];
        header('location: ../../chat.php');
    } else {
        header('location: ../../error.php?id=3');
    }
} else {
    header('location: ../../error.php?id=3');
}
