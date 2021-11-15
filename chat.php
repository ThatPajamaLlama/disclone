<?php

include "assets/inc/user_access_control.php";
include "assets/inc/database_connection.php";

function GetActiveServer($conn) {
    if (isset($_GET['room'])){
        $activeRoom = $_GET['room'];
        $sql_roomServer = "SELECT server.* FROM server INNER JOIN room ON server.id = room.serverid WHERE room.id = $activeRoom";
        $rs_roomServer = mysqli_query($conn, $sql_roomServer);
        $activeServer = mysqli_fetch_assoc($rs_roomServer);
    } else {
        $username = $_SESSION['username'];
        $sql_firstServer = "SELECT server.* FROM server RIGHT JOIN membership ON server.id = membership.serverid WHERE username='$username'";
        $rs_firstServer = mysqli_query($conn, $sql_firstServer);
        if (mysqli_num_rows($rs_firstServer) == 0){
            $activeServer = null;
        } else {
            $activeServer = mysqli_fetch_assoc($rs_firstServer);
        }
        
    }
    return $activeServer;
}

function GetActiveRoom($conn, $activeServer) {
    if (isset($_GET['room'])) {
        $room = $_GET['room'];
        $sql_roomDetails = "SELECT * FROM room WHERE id=$room";
        $rs_roomDetails = mysqli_query($conn, $sql_roomDetails);
        $activeRoom = mysqli_fetch_assoc($rs_roomDetails);
    } else {
        if ($activeServer == null) {
            $activeRoom = null;
        } else {
            $serverid = $activeServer['id'];
            $sql_firstRoom = "SELECT room.* FROM room WHERE serverid='$serverid'";
            $rs_firstRoom = mysqli_query($conn, $sql_firstRoom);
            $activeRoom = mysqli_fetch_assoc($rs_firstRoom);
        }
       
    }
    return $activeRoom;
}



$activeServer = GetActiveServer($conn);
$activeRoom = GetActiveRoom($conn, $activeServer);
?>

<html>
    <?php include "assets/inc/head.php"; ?>
    <body id="chat">
        <div class="flex-container">
        <?php
        include "assets/inc/sidemenu.php";
        echo "<div id='chat-window'>";
        if ($activeServer != null){
            include "assets/inc/chatwindow.php";
        } else {
            echo "<div class='center-contents uh-oh'>";
            echo "<div>";
            echo "<h1>Err... hi!</h1>";
            echo "<img src='assets/img/monster shrug.png'/>";
            echo "<h2>You should join a server!</h2>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
        
        include "assets/inc/users.php";

        ?>
        </div>

        <?php
        include "assets/inc/join_server_modal.php";
        include "assets/inc/create_server_modal.php";
        include "assets/inc/invite_user_modal.php";
        include "assets/inc/create_room_modal.php";
        ?>


        
    </body>
</html>