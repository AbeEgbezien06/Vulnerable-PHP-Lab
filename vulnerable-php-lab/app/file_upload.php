<!DOCTYPE html>
<html>
<head>
    <title>FILE_UPLOAD // PHP Lab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="center-screen">

    <div class="terminal-box">
        <h1>FILE TRANSFER PROTOCOL</h1>

        <p style="color: var(--text-muted); margin-bottom: 20px;">> SELECT LOCAL PAYLOAD FOR UPLOAD</p>

        <form method="POST" enctype="multipart/form-data" style="align-items: flex-start;">
            <input type="file" name="file">
            <button type="submit" style="margin-top: 10px;">INITIATE_TRANSFER</button>
        </form>

        <?php if(isset($_FILES['file'])): ?>
            <div class="output-block" style="border-left-color: #0ff;">
                <span style="color: var(--text-muted);">// UPLOAD STATUS</span><br><br>
                <?php
                if (!is_dir("uploads/")) {
                    @mkdir("uploads/");
                }
                $upload_dir = "uploads/";
                $file = $upload_dir . basename($_FILES['file']['name']);
                if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
                    echo ">> TRANSFER COMPLETE: " . htmlspecialchars($file);
                } else {
                    echo ">> <span style='color: var(--danger-red);'>TRANSFER FAILED</span>";
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
