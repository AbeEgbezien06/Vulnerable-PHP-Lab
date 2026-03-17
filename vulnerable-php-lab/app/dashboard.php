<!DOCTYPE html>
<html>
<head>
    <title>Security Lab Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="sidebar">
    <h2>SYSTEM_NAV</h2>
    <a href="index.php">ROOT_MENU</a>
    <a href="sql_injection.php">SQL_INJECTOR</a>
    <a href="xss.php">XSS_PAYLOADS</a>
    <a href="file_upload.php">FILE_UPLOADER</a>
    <a href="command_injection.php">CMD_EXECUTION</a>
    <a href="lfi.php">FILE_INCLUSION</a>
    <a href="security.php" style="color: var(--danger-red); border-top: 1px dotted var(--text-muted); margin-top: 20px;">SECURITY_LVL</a>
</div>

<div class="content">
    <div class="terminal-box" style="max-width: 800px; margin: 0;">
        <h1>ACCESS GRANTED: DASHBOARD</h1>
        <p style="color: var(--accent-cyan); font-size: 1.1em;">Welcome to the Vulnerable PHP Lab core system.</p>
        
        <div style="margin-top: 30px; border-left: 2px solid var(--text-muted); padding-left: 15px; color: var(--text-muted);">
            <p>> SELECT A MODULE FROM THE SIDEBAR TO BEGIN EXPLOITATION</p>
            <p>> WARNING: ALL OPERATIONS MONITORED</p>
            <p>> TARGET DB: testdb</p>
        </div>
    </div>
</div>

</body>
</html>