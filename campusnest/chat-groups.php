<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Groups - CampusNest</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'views/nav.php'; ?>

    <main class="page-content">
        <div class="chat-container">
            <div class="chat-sidebar">
                <div class="sidebar-header">
                    <h2>Study Groups</h2>
                    <button class="btn btn-primary" onclick="createGroup()">Create Group</button>
                </div>
                <div class="group-list" id="groupList"></div>
            </div>
            <div class="chat-main">
                <div class="chat-header" id="chatHeader">
                    <h3>Select a group to start chatting</h3>
                </div>
                <div class="chat-messages" id="chatMessages"></div>
                <div class="chat-input" id="chatInput" style="display: none;">
                    <div class="input-container">
                        <input type="text" id="messageInput" placeholder="Type your message..." />
                        <button class="send-btn" onclick="sendMessage()">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'views/footer.php'; ?>
    <script src="js/app.js"></script>
</body>
</html>
