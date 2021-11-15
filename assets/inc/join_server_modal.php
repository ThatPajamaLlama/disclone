<div id="join-server" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="close-modal" onclick="document.getElementById('join-server').style.display='none'">&times;</h2>
            <h1>Join a server!</h1>
        </div>
        <div class="modal-body">
            <form action="assets/proc/join_server_process.php" method="post" >
                <div id="code-section" class="section">
                    <input type="text" id="server-code" name="server-code" placeholder="Unique server code"/>
                </div>
                <input type="submit" class="action-button" value="Go!"/>
            </form>
        </div>
    </div>
</div>