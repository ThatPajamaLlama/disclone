<?php

session_start();
if (!isset($_SESSION['username'])){
    header('location: error.php?id=1');
}

?>