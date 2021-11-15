<div id="create-server" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="close-modal" onclick="document.getElementById('create-server').style.display='none'">&times;</h2>
            <h1>Create a server!</h1>
        </div>
        <div class="modal-body">
            <form action="assets/proc/create_server_process.php" method="post" enctype="multipart/form-data">
                <div id="server-name-section" class="section">
                    <input type="text" id="server-name" name="server-name" placeholder="Server name"/>
                </div>
                <div id="room-name-section" class="section">
                    <input type="text" id="room-name" name="room-name" placeholder="Name of first room"/>
                </div>
                <div id="image-section" class="section">
                    <input type="file" id="server-image" name="server-image" placeholder="Server image"/>
                </div>
                <input type="submit" class="action-button" value="Go!"/>
            </form>
        </div>
    </div>
</div>