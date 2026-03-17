<!DOCTYPE html>
<html>
<head>
    <title>CMD_EXEC // PHP Lab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="center-screen">

    <div class="terminal-box">
        <h1>SYSTEM PING DIAGNOSTIC</h1>

        <p style="color: var(--text-muted); margin-bottom: 20px;">> SUPPLY TARGET IP ADDRESS FOR ICMP ECHO</p>

        <form method="GET">
            <input type="text" name="ip" placeholder="127.0.0.1">
            <button type="submit">DISPATCH_PING</button>
        </form>

        <?php if(isset($_GET['ip'])): ?>
            <div class="output-block" style="border-left-color: #fff; background: #222;">
                <span style="color: var(--text-muted);">// ICMP RESPONSE</span><br><br>
<?php
$ip = $_GET['ip'];
// Explicitly unsafe to allow command execution
system("ping -c 1 " . $ip);
?>
            </div>
        <?php endif; ?>

        <div style="margin-top: 30px; border-top: 1px dashed var(--text-muted); padding-top: 15px; text-align: right;">
            <a href="dashboard.php" style="font-size: 0.8em;"><< ABORT & RETURN</a>
        </div>
    </div>

</body>
</html>
