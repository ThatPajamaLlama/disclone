<div id="messages">
    <!-- FILLED USING CHECKMESSAGES() JS METHOD -->
</div>
<div id="new-message">
    <!-- <form action="assets/proc/send_message_process.php" method="POST"> -->
    <form onSubmit="return SendMessage(event);" method="POST" >
        <div class="flex-container">
            <textarea name="text" id="text" placeholder="Your message"></textarea>
            <input type="hidden" name="roomid" id="roomid" value="<?php echo $activeRoom['id'];?>"/>
            <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </div>
    </form>
</div>


<script>
    window.onload = function() {
        CheckMessages();
        setInterval(CheckMessages, 1000);
    }

    function SendMessage(e) {
        e.preventDefault();
        var form = document.querySelector('#new-message form');
        if (form.querySelector('#text').value != ""){
            var request = new XMLHttpRequest();
            request.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("Done");
                    form.querySelector('#text').value = "";
                    CheckMessages();
                }
            };
            request.open("POST", "assets/proc/send_message_process.php", true);
            request.send(new FormData(form));
        }
        
    }

    function CheckMessages() {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                if (response.length > 0) {
                    html = "";
                    response.forEach(function(message) {
                        html += "<div class='message'>";
                        html +=     "<h1>" + message[0] + "</h1>";
                        html +=     "<p>" + message[1] +  "</p>";
                        html += "</div>";
                    });
                    document.querySelector('#messages').innerHTML = html;
                }
                console.log("Checked")
            }
        };
        var link = "assets/proc/display_messages_process.php?roomid=" + document.querySelector('#roomid').value;
        request.open("POST", link, true);
        request.send();
    }
</script>