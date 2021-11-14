<?php

function DisplayUsers($conn, $activeServer) {
    $serverid = $activeServer['id'];
    $sql_serverUsers = "SELECT username FROM membership WHERE serverid='$serverid' ORDER BY username ASC";
    $rs_serverUsers = mysqli_query($conn, $sql_serverUsers);
    for ($i = 1; $i <= mysqli_num_rows($rs_serverUsers); $i++) {
        $user = mysqli_fetch_assoc($rs_serverUsers);
        echo "<div class='user'>";
        echo    "<h2>" . $user['username'] . "</h2>";
        echo "</div>";
    }
}

?>

<div id="users">
    <?php

    if ($activeServer != null) {
        echo "<h1>Users</h1>";
        echo "<h2 class='add-user'><a href=''><i class='fa fa-user-plus' aria-hidden='true'></i>Invite User</a></h2>";
        DisplayUsers($conn, $activeServer);
    }

    ?>
    
</div>