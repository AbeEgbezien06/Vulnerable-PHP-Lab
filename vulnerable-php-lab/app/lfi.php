<!DOCTYPE html>
<html>
<head>
    <title>LFI_MODULE // PHP Lab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="center-screen">

    <div class="terminal-box">
        <h1>LOCAL FILE INCLUSION</h1>

        <p style="color: var(--text-muted); margin-bottom: 20px;">> DYNAMIC SCRIPT LOADER</p>

        <div style="margin-bottom: 20px;">
            <a href="?page=home.php" style="display: inline-block; padding: 10px; border: 1px dotted var(--accent-cyan);">LOAD DEFAULT HOME_TEMPLATE</a>
        </div>

        <?php if(isset($_GET['page'])): ?>
            <div class="output-block">
                <span style="color: var(--text-muted);">// OUTPUT STREAM</span><br><br>
<?php
                // Explicitly unsafe inclusion
                @include($_GET['page']);
?>
            </div>
        <?php endif; ?>

        <div style="margin-top: 30px; border-top: 1px dashed var(--text-muted); padding-top: 15px; text-align: right;">
            <a href="dashboard.php" style="font-size: 0.8em;"><< ABORT & RETURN</a>
        </div>
    </div>

</body>
</html>
