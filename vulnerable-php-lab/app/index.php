<!DOCTYPE html>
<html>
<head>
    <title>Vulnerable PHP Lab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="center-screen">

    <div class="terminal-box" style="text-align: center;">
        <h1>Vulnerable PHP Security Lab</h1>
        <p style="color: var(--text-muted); margin-bottom: 30px;">Initialize connection vectors...</p>

        <ul style="list-style: none; padding: 0;">
            <li style="margin: 15px 0;"><a href="login.php">[ ACTIVATE ] Login Bypass</a></li>
            <li style="margin: 15px 0;"><a href="sql_injection.php">[ ACTIVATE ] SQL Injection</a></li>
            <li style="margin: 15px 0;"><a href="xss.php">[ ACTIVATE ] XSS Attack</a></li>
            <li style="margin: 15px 0;"><a href="file_upload.php">[ ACTIVATE ] File Upload</a></li>
            <li style="margin: 15px 0;"><a href="command_injection.php">[ ACTIVATE ] Command Injection</a></li>
            <li style="margin: 15px 0;"><a href="lfi.php">[ ACTIVATE ] Local File Inclusion</a></li>
        </ul>

        <div style="margin-top: 40px;">
            <a href="dashboard.php" style="color: var(--danger-red); font-size: 0.9em;">>> ENTER DASHBOARD <<</a>
        </div>
    </div>

</body>
</html>