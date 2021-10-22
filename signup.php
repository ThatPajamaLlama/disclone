<!DOCTYPE html>
<html>
    <?php include "assets/inc/head.php"; ?>
    <body id="signup" class="center-contents form-page" onload="ShowErrors();">
        <div id="content">
            <form class="glass-card" action="assets/proc/signup_process.php" method="post" onsubmit="return ValidateRegistration()">
                <div>
                    <a id="back" href="default.php" onmouseover="ShowArrow(this);" onmouseout="HideArrow(this);">Go back home</a>
                    <h1>Signup</h1>
                    <div id="username-section" class="section">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username"/>
                        <?php include "assets/inc/validation_info.php"; ?>
                    </div>
                    <div id="password-section" class="section">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"/>
                        <?php include "assets/inc/validation_info.php"; ?>
                    </div>
                    <div id="password2-section" class="section">
                        <label for="password2">Confirm Password</label>
                        <input type="password" id="password2" name="password2"/>
                        <?php include "assets/inc/validation_info.php"; ?>
                    </div>
                    <input type="submit" class="action-button" value="Go!"/>
                </div>
            </form>
        </div>
        <div id="signup-toast" class="toast">
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            <span> Some text some message..</span>
        </div>
    </body>
</html>

<script type="text/javascript" src="assets/js/backicon.js"></script>

<script>

    function ShowErrors() {
        var urlParams = new URLSearchParams(window.location.search);
        var error = urlParams.get('error');
        if (error == '1') {
            var toast = document.querySelector('#signup-toast');
            toast.querySelector('span').innerHTML = 'This user already exists';
            toast.className = 'toast error show';
            // setTimeout(function(){ toast.className = toast.className.replace("show", ""); }, 3000);
        }
    }

    function ValidateRegistration() {
        var valid = true;

        var usernameSection = document.querySelector('#username-section');
        var passwordSection = document.querySelector('#password-section');
        var password2Section = document.querySelector('#password2-section');

        /* Validate username */
        var usernameError = null;
        var username = usernameSection.querySelector('input').value;
        if (username == "") {
            usernameError = "Must enter a username";
        } else if (username.length < 4 || username.length > 20) {
            usernameError = "Username must be 4-20 characters";
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
        } else if (password.length < 8) {
            passwordError = "Password must be a minimum of 8 characters";
        }
        AlterDisplay(passwordSection, passwordError);
        if (passwordError != null){
            valid = false;
        }

        /* Validate confirm password (password2) */
        var password2Error = null;
        var password2 = password2Section.querySelector('input').value;
        if (password2 == "") {
            password2Error = "Must enter a password";
        } else if (password != password2) {
            password2Error = "Does not match password";
        }
        AlterDisplay(password2Section, password2Error);
        if (password2Error != null){
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