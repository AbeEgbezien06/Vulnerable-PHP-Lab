<?php
session_start();

$conn = new mysqli("db", "root", "root", "testdb");

// Handle potential login attempt
if (isset($_POST['username'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($query);
    
    $login_status = "";
    if ($result && $result->num_rows > 0) {
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
        exit;
    } else {
        $login_status = "ERR_AUTH_FAILED: Invalid credentials supplied.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>AUTH_PORTAL // PHP Lab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="center-screen">

    <div class="terminal-box">
        <h1>AUTHENTICATION</h1>
        
        <p style="color: var(--text-muted); font-size: 0.9em; margin-bottom: 20px;">
            > PLEASE PROVIDE CREDENTIALS FOR ROOT ACCESS
        </p>

        <form method="POST">
            <input type="text" name="username" placeholder=">> USER_ID">
            <input type="password" name="password" placeholder=">> PASSKEY">
            <button type="submit">INITIALIZE_LOGIN</button>
        </form>

        <?php if(!empty($login_status)): ?>
            <div class="output-block" style="border-left-color: var(--danger-red); color: var(--danger-red);">
                <?php echo htmlspecialchars($login_status); /* Just echoing the generic fail message */ ?>
            </div>
        <?php endif; ?>

        <div style="margin-top: 20px; text-align: right;">
            <a href="index.php" style="font-size: 0.8em;"><< RETURN</a>
        </div>
    </div>

</body>
</html>