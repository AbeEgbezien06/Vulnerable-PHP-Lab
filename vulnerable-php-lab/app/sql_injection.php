<?php
$conn = new mysqli("db","root","root","testdb");
?>
<!DOCTYPE html>
<html>
<head>
    <title>SQL_INJECT // PHP Lab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="center-screen">

    <div class="terminal-box">
        <h1>SQL INJECTION MODULE</h1>

        <p style="color: var(--text-muted); margin-bottom: 20px;">> INPUT USER ID TO QUERY DATABASE</p>

        <form method="GET">
            <input type="text" name="id" placeholder="Enter User ID (e.g. 1)">
            <button type="submit">EXECUTE_QUERY</button>
        </form>

        <?php if(isset($_GET['id'])): ?>
            <div class="output-block">
                <span style="color: var(--text-muted);">// QUERY RESULTS</span><br><br>
                <?php
                $id = $_GET['id'];
                $query = "SELECT * FROM users WHERE id='$id'";
                echo "<span style='color: #888;'>Executed: </span><span style='color: var(--danger-red);'>$query</span><br><br>";

                $result = @$conn->query($query);
                if($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                        echo ">> USER_ID: " . htmlspecialchars($row['id']) . " | USERNAME: " . htmlspecialchars($row['username']) . "<br>";
                    }
                } else {
                    echo ">> 0 RECORDS RETURNED";
                }
                ?>
            </div>
        <?php endif; ?>

        <div style="margin-top: 30px; border-top: 1px dashed var(--text-muted); padding-top: 15px; text-align: right;">
            <a href="dashboard.php" style="font-size: 0.8em;"><< ABORT & RETURN</a>
        </div>
    </div>

</body>
</html>