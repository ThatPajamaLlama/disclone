<?php

//TODO: Stop users accessing servers that they aren't in

function DisplayServers($conn, $activeServer) {
    $username = $_SESSION['username'];

    // SQL statement to get all servers that user is in
    $sql_userServers = "SELECT server.*, min(room.id) as room
                        FROM membership
                        LEFT JOIN server ON server.id = membership.serverid
                        LEFT JOIN room ON server.id = room.serverid
                        WHERE membership.username = '$username'
                        GROUP BY server.id";
    $rs_userServers = mysqli_query($conn, $sql_userServers);

    // Display server button
    for ($i = 1; $i <= mysqli_num_rows($rs_userServers); $i++) {
        $server = mysqli_fetch_assoc($rs_userServers);
        if ($server['id'] == $activeServer['id']){
            echo "<div class='server active'>";
        } else {
            echo "<div class='server'>";
        }
        echo    "<a href='chat.php?room=" . $server['room'] . "'>";
        echo        "<div class='server-image' style='background-image: url(server-img/" . $server['id'] . ".jpg);'>";
        echo        "</div>";
        echo        "<h1>" . $server['name'] . "</h1>";
        echo    "</a>";
        echo "</div>";
    }
}

function DisplayRooms($conn, $activeServer, $activeRoom) {
    $serverid = $activeServer['id'];
    $sql_serverRooms = "SELECT * FROM room WHERE serverid='$serverid'";
    $rs_serverRooms = mysqli_query($conn, $sql_serverRooms);
    for ($i = 1; $i <= mysqli_num_rows($rs_serverRooms);  $i++) {
        $room = mysqli_fetch_assoc($rs_serverRooms);
        if ($room['id'] == $activeRoom['id']){
            echo "<h2 class='room active'><a href='#'><i class='fa fa-angle-double-right' aria-hidden='true'></i>" . $room['name'] . "</a></h2>";
        } else {
            echo "<h2 class='room'><a href='?room=" . $room['id'] . "'><i class='fa fa-angle-double-right' aria-hidden='true'></i>" . $room['name'] . "</a></h2>";
        }
    }
}

?>


<div id="side-menu">
    <div id="servers">
        <?php DisplayServers($conn, $activeServer); ?>
        <div id="server-buttons">
            <h1 class="btn"><a href="#">Join</a></h1>
            <h1 class="btn"><a href="#">Create</a></h1>
            <h1 class="logout btn"><a href="assets/proc/logout_process.php">Logout</a></h1>
        </div>
    </div>

    <div id="rooms">
        <h1 class="server-name"><?php echo $activeServer['name'];?></h1>

        <?php 
            if ($_SESSION['username'] == $activeServer['owner']){
                echo "<h2 class='add-room'><a href='#'><i class='fa fa-plus' aria-hidden='true'></i>Add room</a></h2>";
            }

            DisplayRooms($conn, $activeServer, $activeRoom);
        ?>
    </div>
</div>