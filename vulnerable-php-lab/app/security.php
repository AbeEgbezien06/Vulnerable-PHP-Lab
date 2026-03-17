<?php
session_start();

if (isset($_POST['level'])) {
    $_SESSION['security'] = $_POST['level'];
}
$current_level = isset($_SESSION['security']) ? $_SESSION['security'] : "low";
?>

<!DOCTYPE html>
<html>
<head>
    <title>SEC_LEVEL // PHP Lab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="center-screen">

    <div class="terminal-box">
        <h1>SECURITY CONFIG</h1>

        <p style="color: var(--text-muted);">> SETTING GLOBAL MITIGATION LEVEL</p>
        <p style="color: var(--accent-cyan);">> CURRENT STATUS: <?php echo strtoupper(htmlspecialchars($current_level)); ?></p>

        <form method="POST">
            <select name="level">
                <option value="low" <?php echo ($current_level == 'low') ? 'selected' : ''; ?>>LOW // Vulnerable</option>
                <option value="medium" <?php echo ($current_level == 'medium') ? 'selected' : ''; ?>>MEDIUM // Partial Controls</option>
                <option value="high" <?php echo ($current_level == 'high') ? 'selected' : ''; ?>>HIGH // Secured</option>
            </select>
            <button type="submit">COMMIT_CHANGES</button>
        </form>

        <div style="margin-top: 20px; text-align: right;">
            <a href="dashboard.php" style="font-size: 0.8em;"><< RETURN TO DASHBOARD</a>
        </div>
    </div>

</body>
</html>
