<div id="chat-window">
    <div id="messages">
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
        <div id="last" class="message">
            <h1>Shannon</h1>
            <p>Hello! My name is Shannon</p>
        </div>
    </div>
    <div id="new-message">
        <form action="" onSubmit="SendMessage();" method="POST" >
            <div class="flex-container">
                <textarea name="text" id="text" placeholder="Your message"></textarea>
                <!-- <input type="hidden" name="roomid" id="roomid" value="<?php echo $id;?>"/> -->
                <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
</div>

<script>
    window.onload = function() {
        setInterval(CheckMessages, 1000);
    }

    function SendMessage() {
        var form = document.querySelector('#new-message form');
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                CheckMessages();
            }
        };
        request.open("POST", "assets/proc/send_message_process.php", true);
        request.send(new FormData(form));
    }

    function CheckMessages() {
        console.log("Checking messages");
    }
</script>