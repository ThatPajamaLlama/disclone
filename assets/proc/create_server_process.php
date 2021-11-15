<?php

include "../inc/database_connection.php";
session_start();

$previousURL = $_SERVER['HTTP_REFERER'];

$uniqueServerCode = false;
while (!$uniqueServerCode) {
    $serverCode = strtoupper(substr(md5(rand()), 0, 8));
    $sql_checkServerCode = "SELECT * FROM server WHERE id = '$serverCode'";
    $rs_checkServerCode = mysqli_query($conn, $sql_checkServerCode);
    if (mysqli_num_rows($rs_checkServerCode) == 0){
        $uniqueServerCode = true;
    }
}

$serverName = $_POST['server-name'];
$roomName = $_POST['room-name'];
$username = $_SESSION['username'];

$filePath = "../../server-img/";
$file = $_FILES['server-image'];
if ($file["error"] <= 0)
{
	if (!file_exists($filePath . $file["name"]))
	{
		$allowed_exts = array("jpg");
		$explosion = explode(".", $file["name"]);
		$extension = end($explosion);
		if (!in_array($extension, $allowed_exts)){
            header('location: ../../error.php?id=4');
		}
	}
} elseif ($file["error"] == 1){
    header('location: ../../error.php?id=5');
} elseif ($file['error'] == 4){
    header('location: ../../error.php?id=6');
}else {
    header('location: ../../error.php?id=7');
}

move_uploaded_file($file["tmp_name"], $filePath . $serverCode . ".jpg");

$sql_createServer = "INSERT INTO server(id, name, owner) VALUES ('$serverCode', '$serverName', '$username')";
$rs_createServer = mysqli_query($conn, $sql_createServer);

$sql_firstRoom = "INSERT INTO room(name, serverid) VALUES ('$roomName', '$serverCode')";
$rs_firstRoom = mysqli_query($conn, $sql_firstRoom);

$sql_addOwner = "INSERT INTO membership(serverid, username) VALUES ('$serverCode', '$username')";
$rs_addOwner = mysqli_query($conn, $sql_addOwner);

header('location: ' . $previousURL);


?>