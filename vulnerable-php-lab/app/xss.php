<!DOCTYPE html>
<html>
<head>
    <title>XSS_VECTOR // PHP Lab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="center-screen">

    <div class="terminal-box">
        <h1>XSS REFLECTION MODULE</h1>

        <p style="color: var(--text-muted); margin-bottom: 20px;">> TRANSMIT DATA TO SERVER FOR BROADCAST</p>

        <form method="GET">
            <input type="text" name="comment" placeholder="Input broadcast string...">
            <button type="submit">TRANSMIT</button>
        </form>

        <?php if(isset($_GET['comment'])): ?>
            <div class="output-block" style="border-left-color: var(--text-main);">
                <span style="color: var(--text-muted);">// BROADCAST RECEIVED</span><br><br>
                >> <?php echo $_GET['comment']; // Vulnerable output ?>
            </div>
        <?php endif; ?>

        <div style="margin-top: 30px; border-top: 1px dashed var(--text-muted); padding-top: 15px; text-align: right;">
            <a href="dashboard.php" style="font-size: 0.8em;"><< ABORT & RETURN</a>
        </div>
    </div>

</body>
</html>
