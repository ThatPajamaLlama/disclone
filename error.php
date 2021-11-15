<?php

session_start();
$id = isset($_GET["id"]) ? $_GET["id"] : "";

function DisplayError($id) {
    echo "<h2>";
    switch ($id) {
        case 1:
            echo "You must be logged in to access this area";
            DisplayButton("login");
            break;
        case 2:
            echo "Your username must be unique";
            DisplayButton("signup");
            break;
        case 3:
            echo "Incorrect login details";
            DisplayButton("login");
            break;
        case 4:
            echo "Image filetype not accepted (must be jpg)";
            DisplayButton("chat");
            break;
        case 5:
            echo "Image file too large";
            DisplayButton("chat");
            break;
        case 6:
            echo "A server image must be uploaded";
            DisplayButton("chat");
            break;
        case 7:
            echo "An unknown image issue occurred";
            DisplayButton("chat");
            break;
        default:
            echo "There was an issue";
            DisplayButton("default");
            break;
    }
    echo "</h2>";
}

function DisplayButton($page) {
    switch ($page) {
        case "default":
            echo "<a href='default.php' class='action-button'>Go home</a>";
            break;
        case "login":
            echo "<a href='login.php' class='action-button'>Login</a>";
            break;
        case "signup":
            echo "<a href='signup.php' class='action-button'>Signup</a>";
            break;
        case "chat":
            echo "<a href='chat.php' class='action-button'>Get back to chatting!</a>";
    }
} 

?>


<!DOCTYPE html>
<html>
<?php include "assets/inc/head.php"; ?>

<body id="error" class="center-contents form-page">
    <div id="content">
        <div class="glass-card">
            <h1>Error</h1>
            <?php DisplayError($id); ?>
        </div>
    </div>
</body>

</html>