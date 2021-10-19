<!DOCTYPE html>
<html>
    <?php include "assets/inc/head.php"; ?>
    <body id="login" class="center-contents form-page">
        <div id="content">
            <form class="glass-card" action="assets/proc/login_process.php" method="POST">
                <div>
                    <a id="back" href="default.php" onmouseover="ShowArrow(this);" onmouseout="HideArrow(this);">Go back home</a>
                    <h1>Login</h1>
                    <div class="section">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username"/>
                    </div>
                    <div class="section">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"/>
                    </div>
                    <input type="submit" class="action-button" value="Go!"/>
                </div>
            </form>
        </div>
    </body>
</html>

<script type="text/javascript" src="assets/js/backicon.js"></script>