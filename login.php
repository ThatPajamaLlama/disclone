<!DOCTYPE html>
<html>
    <?php include "assets/inc/head.php"; ?>
    <body id="login" class="center-contents form-page">
        <div id="content">
            <form class="glass-card" action="assets/proc/login_process.php" onsubmit="return ValidateLogin();" method="POST">
                <div>
                    <a id="back" href="default.php" onmouseover="ShowArrow(this);" onmouseout="HideArrow(this);">Go back home</a>
                    <h1>Login</h1>
                    <div id="username-section" class="section">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username"/>
                        <?php include "assets/inc/validation_info.php";?>
                    </div>
                    <div id="password-section" class="section">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"/>
                        <?php include "assets/inc/validation_info.php";?>
                    </div>
                    <input type="submit" class="action-button" value="Go!"/>
                </div>
            </form>
        </div>
    </body>
</html>

<script type="text/javascript" src="assets/js/backicon.js"></script>

<script>

    function ValidateLogin() {
        var valid = true;

        var usernameSection = document.querySelector('#username-section');
        var passwordSection = document.querySelector('#password-section');

        /* Validate username */
        var usernameError = null;
        var username = usernameSection.querySelector('input').value;
        if (username == "") {
            usernameError = "Must enter a username";
        }
        AlterDisplay(usernameSection, usernameError);
        if (usernameError != null){
            valid = false;
        }

        /* Validate password */
        var passwordError = null;
        var password = passwordSection.querySelector('input').value;
        if (password == "") {
            passwordError = "Must enter a password";
        }
        AlterDisplay(passwordSection, passwordError);
        if (passwordError != null){
            valid = false;
        }
    
        return valid;
    }

    function AlterDisplay(section, error){
        if (error != null){
            section.querySelector('p').innerHTML = error;
            section.classList = 'section error';
        } else {
            section.classList = 'section success';
        }
    }

</script>