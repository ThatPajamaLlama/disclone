<div id="create-room" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="close-modal" onclick="document.getElementById('create-room').style.display='none'">&times;</h2>
            <h1>Create a room!</h1>
        </div>
        <div class="modal-body">
            <form action="assets/proc/create_room_process.php" method="post" >
                <div id="new-room-name-section" class="section">
                    <input type="text" id="new-room-name" name="new-room-name" placeholder="Room name"/>
                    <input type="hidden" id="server-id" name="server-id" value="<?php echo $activeServer['id'];?>"/>
                </div>
                <input type="submit" class="action-button" value="Go!"/>
            </form>
        </div>
    </div>
</div>